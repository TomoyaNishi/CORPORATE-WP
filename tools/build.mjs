/**
 * 営業先ごとのデモサイト＋診断レポートを一括生成する。
 *
 *   node tools/build.mjs [--data data/prospects.json] [--out dist] [--days 14]
 *
 * 生成物:
 *   dist/<slug>/index.html    デモサイト（トップ1枚）
 *   dist/<slug>/report.html   サイト診断レポート
 *   dist/index.html           自分用の一覧（送付管理）
 *   dist/robots.txt           全ページ noindex
 *   dist/_headers             Cloudflare Pages 用 X-Robots-Tag
 *   out/emails.md             URL 差し込み済みのメール下書き（目視確認用）
 *   out/queue.csv             配信ツール取り込み用
 *
 * 差出人（会社名・氏名・住所・連絡先）は data/sender.json で設定する。
 */

import { readFile, writeFile, mkdir } from 'node:fs/promises';
import path from 'node:path';
import { diagnose } from './diagnose.mjs';
import { renderDemo, renderReport, esc } from './template.mjs';

/* ── 引数 ── */
const argv = process.argv.slice(2);
const arg = (k, d) => {
  const i = argv.indexOf(`--${k}`);
  return i >= 0 && argv[i + 1] ? argv[i + 1] : d;
};
const DATA = arg('data', 'data/prospects.json');
const OUT = arg('out', 'dist');
const DAYS = Number(arg('days', '14'));
const BASE = arg('base', ''); // 例: https://kawagoe.pages.dev

/* ── 公開期限 ── */
const expiryDate = new Date(Date.now() + DAYS * 86400_000);
const EXPIRY = `${expiryDate.getFullYear()}年${expiryDate.getMonth() + 1}月${expiryDate.getDate()}日`;

/* ── 同時実行を絞る（相手サーバーに優しく） ── */
async function mapLimit(items, limit, fn) {
  const out = new Array(items.length);
  let i = 0;
  await Promise.all(
    Array.from({ length: Math.min(limit, items.length) }, async () => {
      while (i < items.length) {
        const idx = i++;
        out[idx] = await fn(items[idx], idx);
        await new Promise((r) => setTimeout(r, 400));
      }
    })
  );
  return out;
}

/* ── 差出人情報 ──
 * 送信元アドレスや会社名は data/sender.json で切り替える。
 * デモサイト・診断レポート・メール本文のすべてに反映される。
 */
const SENDER = JSON.parse(
  await readFile(arg('sender', 'data/sender.json'), 'utf8').catch(() => '{}')
);
if (!SENDER.email) {
  console.error('✕ data/sender.json に email がありません。差出人情報を先に設定してください。');
  process.exit(1);
}
if (/（住所/.test(SENDER.address || '')) {
  console.warn('⚠ data/sender.json の address が未記入です。');
  console.warn('  特定電子メール法で住所の記載は義務です。送信前に必ず埋めてください。\n');
}

/* ── メール下書き ── */

/** 指摘キーごとの一文。語尾を機械的にいじらず、最初から文として持つ */
const SENTENCE = {
  nosite:
    '作られていないのか、それとも検索から見つけにくくなっているのか、\nどちらだろうと思いご連絡しました。',
  unreachable: 'サイトを開こうとしたところ、うまく表示されませんでした。',
  http: 'サイトを開こうとしたところ、エラーになってしまいました。',
  nothtml: 'サイトを開こうとしたところ、うまく読み込めませんでした。',
  viewport:
    'スマートフォン表示の設定が入っていないため、\nスマホで見ると全体が縮小され、文字がかなり小さく表示される状態でした。',
  https:
    'SSL（https）に対応していないため、ブラウザによっては\n「保護されていない通信」という警告が出てしまう状態でした。',
  form:
    'お問い合わせフォームが見当たらず、\n営業時間外のご相談を取りこぼしているかもしれないと感じました。',
  stale:
    '表記が数年前のまま更新されていないようで、\n初めて見る方に「今も営業しているのか」という不安を与えかねない状態でした。',
  speed: '表示までに少し時間がかかっており、待ちきれず離れてしまう方がいそうでした。',
  description:
    '検索結果に表示される説明文が設定されておらず、\n検索したときに内容が伝わりにくい状態でした。',
  images: '写真がほとんど使われておらず、雰囲気が伝わりにくいのがもったいないと感じました。',
};

const ORDER = ['nosite', 'unreachable', 'http', 'nothtml', 'viewport', 'https', 'stale', 'form', 'speed', 'description', 'images'];

function buildEmail(p, diag, urls) {
  const keys = new Set((diag.findings || []).map((f) => f.key));
  const picked = ORDER.filter((k) => keys.has(k)).slice(0, 2);
  const noSite = keys.has('nosite');

  const opening = noSite
    ? `${p.name} 様のホームページを探したのですが、見当たりませんでした。`
    : `${p.name} 様のサイトを拝見しました。`;

  const body = picked.length
    ? picked.map((k) => SENTENCE[k]).join('\n\n')
    : 'スマートフォンでの見え方に、まだ伸ばせる余地がありそうだと感じました。';

  // 写真を借りていない場合は、その旨の断り書きを出さない
  const photoNote =
    !noSite && (diag.images || []).length
      ? '※ 掲載中のお写真は御社サイトのものを参照して表示しているだけで、\n　 当方に保存はしておりません。制作時はご提供いただいたデータに差し替えます。\n'
      : '';

  return `----------------------------------------
【${p.name}】 ${p.url || '(サイトなし)'}   診断スコア ${diag.score}/100
指摘: ${[...keys].join(', ') || 'なし'}
----------------------------------------
件名: ホームページ、5ページ15万円・1週間で作ります

${p.name} 御中

突然のご連絡失礼いたします。${SENDER.company}の${SENDER.personShort || SENDER.person}と申します。

小規模の店舗・会社さま向けに、ホームページを
5ページ・15万円・7営業日で制作しています。

${opening}
${body}

具体的にどこがどうなっているかを1枚にまとめました。

　診断結果　${urls.report}

あわせて、${p.name} 様向けのトップページ案を実際に作ってみました。
文章でご説明するより、見ていただいたほうが早いと思います。

　トップページ案　${urls.demo}

　・ご自身で更新できます（WordPress）
　・スマホ対応、お問い合わせフォーム、SSLまで込み
　・修正2回まで込み。追加費用は事前に全てご提示します
　・金額と納期は固定です

※ 上記ページは検索には表示されません（noindex）。
${photoNote}※ 公開期限は ${EXPIRY} です。

「今は必要ない」というご判断でしたら、それはそれで正しいと思います。
その旨ご返信いただければ、即日削除いたします。

もし少しでも引っかかる点があれば、15分ほどお時間をいただき、
現状を伺えればと思います。

---
${SENDER.company}　${SENDER.person}
${SENDER.address}
配信停止・掲載停止のご連絡: ${SENDER.email}
本メールの配信が不要な場合は、上記アドレスまでご返信ください。以後お送りいたしません。

`;
}

/* ── main ── */
const raw = await readFile(DATA, 'utf8');
const prospects = JSON.parse(raw);

console.log(`▶ ${prospects.length} 件を処理します（公開期限 ${EXPIRY}）\n`);

const results = await mapLimit(prospects, 4, async (p) => {
  const diag = await diagnose(p.url);
  const dir = path.join(OUT, p.slug);
  await mkdir(dir, { recursive: true });

  const urls = {
    demo: BASE ? `${BASE}/${p.slug}/` : `./${p.slug}/`,
    report: BASE ? `${BASE}/${p.slug}/report.html` : `./${p.slug}/report.html`,
  };

  await writeFile(
    path.join(dir, 'index.html'),
    renderDemo(p, diag, { expiry: EXPIRY, sender: SENDER }),
    'utf8'
  );
  await writeFile(
    path.join(dir, 'report.html'),
    renderReport(p, diag, { expiry: EXPIRY, demoPath: './', sender: SENDER }),
    'utf8'
  );

  const mark = diag.error ? '✕' : diag.score <= 50 ? '◎' : diag.score <= 75 ? '○' : '△';
  console.log(
    `  ${mark} ${String(diag.score).padStart(3)} /100  ${p.slug.padEnd(16)} ${p.name}` +
      (diag.error ? `  (${diag.error})` : ` 画像${diag.images.length}枚`)
  );

  return { p, diag, urls };
});

/* ── 自分用の一覧 ── */
const rows = results
  .sort((a, b) => a.diag.score - b.diag.score)
  .map(
    ({ p, diag, urls }) => `
  <tr>
    <td class="s ${diag.score <= 50 ? 'hot' : ''}">${diag.score}</td>
    <td>${esc(p.name)}<br><span class="m">${esc(p.industry)}</span></td>
    <td>${(diag.findings || []).slice(0, 3).map((f) => esc(f.label)).join('<br>') || '—'}</td>
    <td class="l">
      <a href="./${p.slug}/">デモ</a><br>
      <a href="./${p.slug}/report.html">診断</a><br>
      ${p.url ? `<a href="${esc(p.url)}" target="_blank" rel="noopener noreferrer">現サイト</a>` : ''}
    </td>
  </tr>`
  )
  .join('');

await writeFile(
  path.join(OUT, 'index.html'),
  `<!doctype html><html lang="ja"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow"><title>送付リスト（社内用）</title>
<style>
body{font-family:system-ui,"Hiragino Kaku Gothic ProN",sans-serif;background:#f6f5f2;color:#22201e;margin:0;padding:2rem 1rem;font-size:14px;line-height:1.8}
.w{max-width:60rem;margin:0 auto}
h1{font-size:1.2rem;letter-spacing:.06em}
p.meta{color:#7d766c;font-size:.85rem}
table{border-collapse:collapse;width:100%;margin-top:1.5rem;background:#fff}
th,td{text-align:left;padding:.7rem .8rem;border-bottom:1px solid #e2ddd4;vertical-align:top}
th{font-size:.72rem;letter-spacing:.12em;color:#7d766c;border-bottom:1px solid #7d766c}
td.s{font-variant-numeric:tabular-nums;font-weight:700;width:3.5rem}
td.s.hot{color:#b64826}
td.l{white-space:nowrap;width:6rem}
span.m{color:#9a9288;font-size:.78rem}
a{color:#223a70}
</style></head><body><div class="w">
<h1>送付リスト（社内用）</h1>
<p class="meta">生成 ${new Date().toLocaleString('ja-JP')} ／ 公開期限 ${EXPIRY} ／ ${results.length}件<br>
スコアが低いほど改善余地が大きい＝提案が刺さりやすい。</p>
<table>
<thead><tr><th>点</th><th>店舗</th><th>指摘</th><th>リンク</th></tr></thead>
<tbody>${rows}</tbody></table>
</div></body></html>`,
  'utf8'
);

/* ── noindex を二重で担保 ── */
await writeFile(path.join(OUT, 'robots.txt'), 'User-agent: *\nDisallow: /\n', 'utf8');
await writeFile(
  path.join(OUT, '_headers'),
  '/*\n  X-Robots-Tag: noindex, nofollow, noarchive, noimageindex\n',
  'utf8'
);

/* ── メール下書き ── */
await mkdir('out', { recursive: true });
await writeFile(
  'out/emails.md',
  `# 送付用メール下書き（${results.length}件）\n\n` +
    `生成: ${new Date().toLocaleString('ja-JP')}　公開期限: ${EXPIRY}\n\n` +
    `※ スコアの低い順。1通ずつ「拝見しました」の一文は必ず自分の言葉で書き直すこと。\n\n` +
    results
      .sort((a, b) => a.diag.score - b.diag.score)
      .map(({ p, diag, urls }) => buildEmail(p, diag, urls))
      .join('\n'),
  'utf8'
);

/* ── 配信ツールに読ませる CSV ──
 * 送信そのものは配信サービス側に任せる（到達率・バウンス処理・配信停止の
 * 反映は、自前で書くより専用サービスのほうが確実なため）。
 */
const csvCell = (v) => `"${String(v ?? '').replace(/"/g, '""')}"`;

const sorted = [...results].sort((a, b) => a.diag.score - b.diag.score);
const missingEmail = sorted.filter((r) => !r.p.email);

const header = [
  'email', 'name', 'industry', 'score', 'findings',
  'subject', 'body', 'demo_url', 'report_url', 'current_url',
];

const csv =
  header.join(',') +
  '\n' +
  sorted
    .filter((r) => r.p.email)
    .map(({ p, diag, urls }) =>
      [
        p.email,
        p.name,
        p.industry,
        diag.score,
        (diag.findings || []).map((f) => f.key).join(' '),
        'ホームページ、5ページ15万円・1週間で作ります',
        buildEmail(p, diag, urls).split('\n').slice(6).join('\n').trim(),
        urls.demo,
        urls.report,
        p.url || '',
      ]
        .map(csvCell)
        .join(',')
    )
    .join('\n');

await writeFile('out/queue.csv', '﻿' + csv, 'utf8'); // BOM付き（Excel対策）

console.log(`\n✓ ${OUT}/ に生成しました`);
console.log(`✓ out/emails.md  メール下書き ${results.length}通（目視確認用）`);
console.log(`✓ out/queue.csv  配信ツール取り込み用 ${sorted.length - missingEmail.length}件`);
if (missingEmail.length) {
  console.log(
    `\n⚠ email 未記入のため CSV から除外: ${missingEmail.length}件` +
      `\n   ${missingEmail.map((r) => r.p.name).join(', ')}`
  );
}
console.log(`\n確認:  npx serve ${OUT}   または  python3 -m http.server -d ${OUT} 8000`);
console.log(`送信前:  node tools/preflight.mjs <送信ドメイン>`);
