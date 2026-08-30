/**
 * 送信ドメインの事前チェック（依存ゼロ / Node 18+）
 *
 *   node tools/preflight.mjs mail.example.com --selector s1
 *
 * コールドメールが届かない原因は、ほぼこの3つの設定漏れ。
 * 1通も送る前に、ここが全部緑になっていることを確認する。
 */

import { promises as dns } from 'node:dns';

const args = process.argv.slice(2);
const domain = args.find((a) => !a.startsWith('--'));
const selArg = args.indexOf('--selector');
const selectors = selArg >= 0 && args[selArg + 1]
  ? [args[selArg + 1]]
  : ['default', 'google', 's1', 's2', 'selector1', 'selector2', 'k1', 'mail', 'dkim'];

if (!domain) {
  console.error(`使い方: node tools/preflight.mjs <送信ドメイン> [--selector <DKIMセレクタ>]

例: node tools/preflight.mjs mail.nous-creators.com --selector s1

※ メインドメインではなく、送信専用のサブドメインを指定すること。
   メインドメインで送ってスパム判定を受けると、取引先へのメールも届かなくなる。`);
  process.exit(1);
}

const OK = '  OK  ';
const NG = ' 未設定';
const WARN = '  ？  ';

const results = [];
function report(key, status, label, detail) {
  results.push({ key, status });
  const mark = status === 'ok' ? OK : status === 'warn' ? WARN : NG;
  console.log(`[${mark}] ${label}`);
  if (detail) console.log(`         ${detail}`);
}

async function txt(name) {
  try {
    return (await dns.resolveTxt(name)).map((r) => r.join(''));
  } catch {
    return [];
  }
}

console.log(`\n送信ドメイン: ${domain}\n${'─'.repeat(52)}`);

/* ── MX ── */
try {
  const mx = await dns.resolveMx(domain);
  if (mx.length) {
    report('mx', 'ok', 'MX レコード', mx.map((m) => `${m.exchange} (${m.priority})`).join(', '));
  } else {
    report('mx', 'warn', 'MX レコードがありません', '返信を受け取れません。受信もこのドメインで行うなら必須。');
  }
} catch {
  report('mx', 'warn', 'MX レコードがありません', '返信を受け取れません。受信もこのドメインで行うなら必須。');
}

/* ── SPF ── */
const spf = (await txt(domain)).filter((t) => /^v=spf1/i.test(t));
if (spf.length === 1) {
  report('spf', 'ok', 'SPF レコード', spf[0]);
  if (/[?~+]all\s*$/i.test(spf[0]) && !/-all\s*$/i.test(spf[0])) {
    console.log('         ※ 末尾が -all（hard fail）だとより強く保護されます');
  }
} else if (spf.length > 1) {
  report('spf', 'ng', 'SPF レコードが2件以上あります（不正）', 'SPFは1ドメインに1件まで。統合してください。');
} else {
  report('spf', 'ng', 'SPF レコードがありません',
    `TXT ${domain} → "v=spf1 include:<送信サービス> -all" を追加`);
}

/* ── DMARC ── */
const dmarc = (await txt(`_dmarc.${domain}`)).filter((t) => /^v=DMARC1/i.test(t));
if (dmarc.length) {
  const policy = (dmarc[0].match(/\bp=(\w+)/i) || [])[1] || '不明';
  report('dmarc', 'ok', `DMARC レコード（p=${policy}）`, dmarc[0]);
  if (/^none$/i.test(policy)) {
    console.log('         ※ 最初は p=none で問題ありません。安定したら quarantine に上げます');
  }
} else {
  report('dmarc', 'ng', 'DMARC レコードがありません',
    `TXT _dmarc.${domain} → "v=DMARC1; p=none; rua=mailto:あなたのアドレス" を追加`);
}

/* ── DKIM ── */
let dkimFound = null;
for (const s of selectors) {
  const rec = await txt(`${s}._domainkey.${domain}`);
  if (rec.some((t) => /v=DKIM1|k=rsa|p=/i.test(t))) {
    dkimFound = s;
    break;
  }
}
if (dkimFound) {
  report('dkim', 'ok', `DKIM レコード（セレクタ: ${dkimFound}）`);
} else {
  report('dkim', 'ng', 'DKIM レコードが見つかりません',
    `試したセレクタ: ${selectors.join(', ')}\n         ` +
    '送信サービスが指定するセレクタで --selector を指定するか、DKIMを設定してください');
}

/* ── まとめ ── */
console.log('─'.repeat(52));

const ng = results.filter((r) => r.status === 'ng').map((r) => r.key);
const critical = ng.filter((k) => k === 'spf' || k === 'dkim' || k === 'dmarc');

if (critical.length === 0) {
  console.log('\n✓ SPF / DKIM / DMARC はすべて設定済みです。\n');
  console.log('  次の注意点:');
  console.log('  ・新しいドメインは、いきなり大量に送ると評価が下がります');
  console.log('  ・初日は5通程度から始め、1週間かけて増やしてください');
  console.log('  ・配信停止の依頼は必ず即日反映すること\n');
} else {
  console.log(`\n✕ ${critical.join(' / ').toUpperCase()} が未設定です。この状態で送ると迷惑メールに振り分けられます。`);
  console.log('  DNSに上記のレコードを追加してから、もう一度実行してください。\n');
  process.exitCode = 1;
}

if (/^[^.]+\.[^.]+$/.test(domain)) {
  console.log(`※ ${domain} はトップレベルのドメインに見えます。`);
  console.log('   営業メールは mail.' + domain + ' のような送信専用サブドメインから送り、');
  console.log('   普段の取引に使うドメインの評価を巻き添えにしないようにしてください。\n');
}
