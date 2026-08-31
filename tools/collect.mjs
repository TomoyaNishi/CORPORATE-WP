/**
 * 営業先リストの自動収集（依存ゼロ / Node 18+）
 *
 *   export GOOGLE_PLACES_API_KEY=...
 *   node tools/collect.mjs --area 川越市 --type 美容室 --limit 60
 *   node tools/collect.mjs --area 川越市 --type 美容室 --type 整体 --industry salon
 *
 * Google Places API (New) の Text Search で店舗を集め、
 * 各サイトを1回だけ取得してメールアドレスを探し、
 * data/prospects.json の雛形として出力する。
 *
 * 出力:
 *   out/candidates.json   収集した全件（除外理由つき）
 *   out/prospects.draft.json  そのまま build.mjs に渡せる形
 */

import { writeFile, mkdir } from 'node:fs/promises';

const KEY = process.env.GOOGLE_PLACES_API_KEY;
const argv = process.argv.slice(2);
const arg = (k, d) => {
  const i = argv.indexOf(`--${k}`);
  return i >= 0 && argv[i + 1] ? argv[i + 1] : d;
};
const args = (k) =>
  argv.reduce((a, v, i) => (v === `--${k}` && argv[i + 1] ? [...a, argv[i + 1]] : a), []);

const AREA = arg('area', '川越市');
const TYPES = args('type').length ? args('type') : ['美容室'];
const LIMIT = Number(arg('limit', '60'));
const INDUSTRY = arg('industry', 'salon');
const PREFIX = arg('prefix', 'kawagoe');

if (!KEY) {
  console.error(`✕ GOOGLE_PLACES_API_KEY が設定されていません。

  1. https://console.cloud.google.com/ でプロジェクトを作る
  2. 「Places API (New)」を有効にする
  3. 認証情報からAPIキーを発行する
  4. export GOOGLE_PLACES_API_KEY=あなたのキー

無料枠があるので、数百件の収集なら費用はかかりません。`);
  process.exit(1);
}

const UA = 'Mozilla/5.0 (compatible; ShuWebAudit/1.0)';
const sleep = (ms) => new Promise((r) => setTimeout(r, ms));

/* ── Places API で店舗を集める ───────────────────── */
async function search(textQuery) {
  const found = [];
  let pageToken = null;

  do {
    const res = await fetch('https://places.googleapis.com/v1/places:searchText', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Goog-Api-Key': KEY,
        'X-Goog-FieldMask': [
          'places.id',
          'places.displayName',
          'places.formattedAddress',
          'places.nationalPhoneNumber',
          'places.websiteUri',
          'places.businessStatus',
          'nextPageToken',
        ].join(','),
      },
      body: JSON.stringify({
        textQuery,
        languageCode: 'ja',
        regionCode: 'JP',
        maxResultCount: 20,
        ...(pageToken ? { pageToken } : {}),
      }),
    });

    if (!res.ok) {
      const t = await res.text();
      throw new Error(`Places API ${res.status}: ${t.slice(0, 300)}`);
    }

    const j = await res.json();
    for (const p of j.places || []) {
      found.push({
        placeId: p.id,
        name: p.displayName?.text || '',
        address: p.formattedAddress || '',
        tel: p.nationalPhoneNumber || '',
        url: p.websiteUri || '',
        status: p.businessStatus || '',
      });
    }
    pageToken = j.nextPageToken || null;
    if (pageToken) await sleep(1200); // トークンが有効になるまで少し待つ
  } while (pageToken && found.length < LIMIT);

  return found.slice(0, LIMIT);
}

/* ── サイトからメールアドレスを探す ─────────────────
 * トップと、よくある問い合わせページを1回ずつだけ見る。
 * 相手のサーバーに負荷をかけないこと。
 */
const EMAIL_RE = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/g;

// 画像ファイル名やライブラリの文字列を誤検出しないための除外
const BAD = /(\.(png|jpe?g|gif|svg|webp|css|js)$|@2x|example\.|sentry\.|wixpress|squarespace|godaddy|sentry-|\.png@|domain\.com|yourmail|test@|noreply@|no-reply@)/i;

function pickEmails(html) {
  const out = new Set();
  for (const m of html.matchAll(/mailto:([^"'?>\s]+)/gi)) {
    const e = decodeURIComponent(m[1]).trim();
    if (!BAD.test(e)) out.add(e);
  }
  for (const m of html.match(EMAIL_RE) || []) {
    if (!BAD.test(m)) out.add(m);
  }
  return [...out];
}

async function get(url) {
  try {
    const ctrl = new AbortController();
    const t = setTimeout(() => ctrl.abort(), 12000);
    const res = await fetch(url, {
      headers: { 'User-Agent': UA },
      redirect: 'follow',
      signal: ctrl.signal,
    });
    clearTimeout(t);
    if (!res.ok) return { ok: false, html: '', url };
    const ct = res.headers.get('content-type') || '';
    if (!/text\/html|xhtml/i.test(ct)) return { ok: false, html: '', url: res.url };
    return { ok: true, html: await res.text(), url: res.url };
  } catch {
    return { ok: false, html: '', url };
  }
}

async function findEmail(siteUrl) {
  const top = await get(siteUrl);
  if (!top.ok) return { emails: [], hasForm: false, reachable: false };

  let emails = pickEmails(top.html);
  const hasForm = /<form[\s>]/i.test(top.html);

  if (!emails.length) {
    // 問い合わせページへのリンクを1つだけ辿る
    const link = [...top.html.matchAll(/href=["']([^"']+)["'][^>]*>([^<]{0,40})</gi)].find(
      ([, href, text]) =>
        /contact|inquiry|toiawase|otoiawase|問い?合わせ/i.test(href + text)
    );
    if (link) {
      try {
        const abs = new URL(link[1], top.url).href;
        await sleep(500);
        const c = await get(abs);
        if (c.ok) emails = pickEmails(c.html);
      } catch {}
    }
  }
  return { emails, hasForm, reachable: true };
}

/* ── main ───────────────────────────────────────── */
console.log(`▶ ${AREA} × ${TYPES.join(' / ')} を収集します（上限 ${LIMIT}件）\n`);

const seen = new Map();
for (const type of TYPES) {
  const q = `${AREA} ${type}`;
  process.stdout.write(`  検索: ${q} ... `);
  try {
    const rows = await search(q);
    for (const r of rows) if (!seen.has(r.placeId)) seen.set(r.placeId, { ...r, type });
    console.log(`${rows.length}件`);
  } catch (e) {
    console.log(`失敗 (${e.message})`);
  }
  await sleep(600);
}

const all = [...seen.values()];
console.log(`\n重複を除いて ${all.length}件。各サイトを確認します...\n`);

const results = [];
for (const [i, r] of all.entries()) {
  if (r.status === 'CLOSED_PERMANENTLY') {
    results.push({ ...r, exclude: '閉業' });
    continue;
  }
  if (!r.url) {
    // サイトなしは「対象外」。無い＝必要性を感じていないことが多い
    results.push({ ...r, exclude: 'サイトなし', emails: [] });
    continue;
  }
  const { emails, hasForm, reachable } = await findEmail(r.url);
  results.push({
    ...r,
    emails,
    hasForm,
    exclude: !reachable ? 'サイトに接続できない' : emails.length ? null : 'メールアドレス非公開',
  });
  process.stdout.write(
    `  [${String(i + 1).padStart(3)}/${all.length}] ${emails.length ? '✓' : '−'} ${r.name}\n`
  );
  await sleep(800); // 相手のサーバーに優しく
}

const usable = results.filter((r) => !r.exclude);

/* ── 出力 ── */
await mkdir('out', { recursive: true });
await writeFile('out/candidates.json', JSON.stringify(results, null, 2), 'utf8');

const draft = usable.map((r, i) => ({
  slug: `${PREFIX}-${String(i + 1).padStart(3, '0')}`,
  name: r.name,
  industry: INDUSTRY,
  email: r.emails[0],
  url: r.url,
  address: r.address,
  tel: r.tel,
  hours: '',
  tagline: '',
  leadTitle: '',
  lead: '',
  points: [],
  items: [],
  mapQuery: `${r.name} ${r.address}`,
  _note: '文章と写真の項目は手で埋めるか、返信が来てから埋める',
}));
await writeFile('out/prospects.draft.json', JSON.stringify(draft, null, 2), 'utf8');

/* ── 集計 ── */
const by = results.reduce((a, r) => ((a[r.exclude || '使える'] = (a[r.exclude || '使える'] || 0) + 1), a), {});
console.log('\n' + '─'.repeat(46));
for (const [k, v] of Object.entries(by).sort((a, b) => b[1] - a[1])) {
  console.log(`  ${String(v).padStart(4)} 件  ${k}`);
}
console.log('─'.repeat(46));
console.log(`\n✓ out/candidates.json      全 ${results.length}件（除外理由つき）`);
console.log(`✓ out/prospects.draft.json 送れる ${usable.length}件`);

const noMail = results.filter((r) => r.exclude === 'メールアドレス非公開').length;
if (noMail) {
  console.log(
    `\n※ ${noMail}件はメールアドレスを公開していません（問い合わせフォームのみ）。` +
      `\n  問い合わせフォームへの営業送信は心象が悪く、法の例外にも当たらないため対象外にしています。`
  );
}
console.log(`\n次:  cp out/prospects.draft.json data/prospects.json`);
console.log(`     内容を確認・取捨選択してから  node tools/build.mjs`);
