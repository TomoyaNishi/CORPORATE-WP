/**
 * 1ページのデモサイト＋診断レポートを生成する。
 *
 * 画像は営業先サイトの URL をそのまま参照する（ホットリンク）。
 * 自分側にコピーを保存しないため、複製にはあたらない。
 * 読み込めなかった場合は onerror でプレースホルダーに落ちる。
 */

const esc = (s) =>
  String(s ?? '')
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;');

/* ── 業種別のトーン ───────────────────────────── */
const THEMES = {
  washoku: {
    label: '和食・甘味',
    gallery: '店内・お品',
    fonts:
      'family=Zen+Old+Mincho:wght@500;700&family=Noto+Sans+JP:wght@400;500;700',
    display: '"Zen Old Mincho", "Noto Serif JP", serif',
    body: '"Noto Sans JP", system-ui, "Hiragino Kaku Gothic ProN", sans-serif',
    vars: {
      bg: '#f4f1e8', surface: '#faf8f2', ink: '#2b2b2b', sub: '#5f5c55',
      faint: '#8d887d', rule: '#ded7c5', accent: '#223a70', accentSoft: '#e4e8f1',
      gold: '#a8914a',
    },
    paper: true,
  },
  salon: {
    label: '美容室・サロン',
    gallery: '店内・スタイル',
    fonts:
      'family=Noto+Serif+JP:wght@400;600&family=Noto+Sans+JP:wght@400;500;700',
    display: '"Noto Serif JP", serif',
    body: '"Noto Sans JP", system-ui, "Hiragino Kaku Gothic ProN", sans-serif',
    vars: {
      bg: '#faf9f7', surface: '#ffffff', ink: '#1f1d1b', sub: '#5c574f',
      faint: '#918a7f', rule: '#e4dfd7', accent: '#3a5a4c', accentSoft: '#e6ece8',
      gold: '#8a7a5f',
    },
  },
  seitai: {
    label: '整体・治療院',
    gallery: '院内のご案内',
    fonts: 'family=Noto+Sans+JP:wght@400;500;700;900',
    display: '"Noto Sans JP", system-ui, sans-serif',
    body: '"Noto Sans JP", system-ui, "Hiragino Kaku Gothic ProN", sans-serif',
    vars: {
      bg: '#f6f9fa', surface: '#ffffff', ink: '#1e2a32', sub: '#4d5c66',
      faint: '#8194a0', rule: '#dbe4e9', accent: '#1f5f7a', accentSoft: '#e3eef3',
      gold: '#c08b3e',
    },
  },
};

function theme(key) {
  return THEMES[key] || THEMES.salon;
}

/** 画像タグ。失敗したらプレースホルダーに差し替わる */
function img(src, alt, cls) {
  if (!src) return `<div class="ph ${cls || ''}"><span>お店のお写真がここに入ります</span></div>`;
  return `<img class="${cls || ''}" src="${esc(src)}" alt="${esc(alt)}" loading="lazy"
    referrerpolicy="no-referrer"
    onerror="this.outerHTML='<div class=&quot;ph ${cls || ''}&quot;><span>お店のお写真がここに入ります</span></div>'">`;
}

function head(title, t, expiry) {
  const v = t.vars;
  return `<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow, noarchive, noimageindex">
<meta name="referrer" content="no-referrer">
<title>${esc(title)}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?${t.fonts}&display=swap">
<style>
:root{
  --bg:${v.bg}; --surface:${v.surface}; --ink:${v.ink}; --sub:${v.sub};
  --faint:${v.faint}; --rule:${v.rule}; --accent:${v.accent};
  --accent-soft:${v.accentSoft}; --gold:${v.gold};
  --display:${t.display}; --body:${t.body};
  --measure:44rem;
}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{
  margin:0; background:var(--bg); color:var(--ink);
  font-family:var(--body); font-size:16px; line-height:1.95;
  -webkit-font-smoothing:antialiased;
  ${t.paper ? `background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.12'/%3E%3C/svg%3E");` : ''}
}
img{max-width:100%;display:block}
h1,h2,h3{font-family:var(--display);margin:0;letter-spacing:.06em;line-height:1.55;text-wrap:balance}
p{margin:0}
a{color:var(--accent)}
.wrap{max-width:var(--measure);margin:0 auto;padding:0 1.25rem}
.ph{
  background:var(--accent-soft); border:1px dashed var(--rule);
  display:grid; place-items:center; min-height:200px; color:var(--faint);
  font-size:.8rem; letter-spacing:.08em; text-align:center; padding:1rem;
}

/* ── notice ── */
.notice{
  background:var(--ink); color:var(--bg); font-size:.78rem; line-height:1.8;
  padding:.7rem 1.25rem; text-align:center; letter-spacing:.03em;
}
.notice b{color:var(--gold)}

/* ── hero ── */
.hero{position:relative;overflow:hidden}
.hero__media{position:relative;height:min(64vh,520px)}
.hero__media img,.hero__media .ph{width:100%;height:100%;object-fit:cover}
.hero__media::after{
  content:"";position:absolute;inset:0;
  background:linear-gradient(180deg,rgba(0,0,0,.15) 0%,rgba(0,0,0,.55) 100%);
}
.hero__body{
  position:absolute;inset:auto 0 0 0;padding:2rem 1.25rem 2.5rem;color:#fff;
  max-width:var(--measure);margin:0 auto;
}
.hero__kicker{font-size:.72rem;letter-spacing:.28em;opacity:.85;margin-bottom:.9rem}
.hero__name{font-size:clamp(1.9rem,7vw,3rem);color:#fff}
.hero__tag{font-size:clamp(1rem,3.4vw,1.15rem);margin-top:.9rem;opacity:.95;font-family:var(--display)}

/* ── sections ── */
section{padding:4rem 0}
.lead{font-size:1.02rem;color:var(--sub)}
.kicker{
  font-size:.7rem;letter-spacing:.24em;color:var(--gold);font-weight:700;
  margin-bottom:.9rem;font-family:var(--body)
}
h2{font-size:clamp(1.3rem,4.6vw,1.7rem);margin-bottom:1.5rem}

.points{display:grid;gap:1.75rem;margin-top:2rem}
@media(min-width:720px){.points{grid-template-columns:repeat(3,1fr)}}
.point__n{
  font-family:var(--display);font-size:.85rem;color:var(--gold);
  letter-spacing:.1em;margin-bottom:.5rem
}
.point h3{font-size:1.05rem;margin-bottom:.55rem}
.point p{font-size:.92rem;color:var(--sub)}

.menu{background:var(--surface);border-top:1px solid var(--rule);border-bottom:1px solid var(--rule)}
.items{margin-top:1.75rem;border-top:1px solid var(--rule)}
.item{
  display:flex;gap:1rem;align-items:baseline;justify-content:space-between;
  padding:1.05rem .2rem;border-bottom:1px solid var(--rule)
}
.item__name{font-family:var(--display);font-size:1.02rem}
.item__note{display:block;font-family:var(--body);font-size:.8rem;color:var(--faint);letter-spacing:.02em}
.item__price{font-size:.95rem;white-space:nowrap;font-variant-numeric:tabular-nums;color:var(--sub)}

.gallery{display:grid;grid-template-columns:repeat(2,1fr);gap:.6rem;margin-top:2rem}
@media(min-width:720px){.gallery{grid-template-columns:repeat(3,1fr)}}
.gallery img,.gallery .ph{width:100%;aspect-ratio:4/3;object-fit:cover;min-height:0}

.info{display:grid;gap:0;margin-top:1.75rem;border-top:1px solid var(--rule)}
.info__row{display:grid;grid-template-columns:6.5rem 1fr;gap:1rem;padding:.95rem .2rem;border-bottom:1px solid var(--rule);font-size:.92rem}
.info__k{color:var(--faint);font-size:.8rem;letter-spacing:.08em}

.cta{background:var(--accent);color:#fff;text-align:center}
.cta h2{color:#fff}
.cta p{color:rgba(255,255,255,.88);font-size:.95rem}
.cta__btn{
  display:inline-block;margin-top:1.75rem;background:#fff;color:var(--accent);
  text-decoration:none;font-weight:700;padding:1rem 2.75rem;letter-spacing:.08em;
  border-radius:2px;font-size:.95rem
}
.cta__btn:focus-visible{outline:3px solid var(--gold);outline-offset:3px}

footer{padding:2.5rem 0 4rem;font-size:.78rem;color:var(--faint);line-height:2}
footer strong{color:var(--sub)}
.disclaimer{border:1px solid var(--rule);background:var(--surface);padding:1.25rem;margin-bottom:1.5rem}
</style>`;
}

/* ── デモサイト本体 ───────────────────────────── */
export function renderDemo(p, diag, opts = {}) {
  const t = theme(p.industry);
  const expiry = opts.expiry || '';
  const imgs = (diag && diag.images) || [];
  const hero = imgs[0] || null;
  const gallery = imgs.slice(1, 7);

  const points = (p.points || [])
    .map(
      (x, i) => `
      <div class="point">
        <div class="point__n">0${i + 1}</div>
        <h3>${esc(x.title)}</h3>
        <p>${esc(x.body)}</p>
      </div>`
    )
    .join('');

  const items = (p.items || [])
    .map(
      (x) => `
      <div class="item">
        <div class="item__name">${esc(x.name)}${
          x.note ? `<span class="item__note">${esc(x.note)}</span>` : ''
        }</div>
        <div class="item__price">${esc(x.price || '')}</div>
      </div>`
    )
    .join('');

  const galleryHtml = gallery.length
    ? `<div class="gallery">${gallery
        .map((s, i) => img(s, `${p.name} の様子 ${i + 1}`))
        .join('')}</div>`
    : `<div class="gallery">${[0, 1, 2]
        .map(() => img(null, ''))
        .join('')}</div>`;

  const rows = [
    ['店名', p.name],
    ['住所', p.address],
    ['電話', p.tel],
    ['営業時間', p.hours],
  ]
    .filter(([, v]) => v)
    .map(
      ([k, v]) =>
        `<div class="info__row"><div class="info__k">${esc(k)}</div><div>${esc(v)}</div></div>`
    )
    .join('');

  const mapQ = encodeURIComponent(p.mapQuery || `${p.name} ${p.address || ''}`.trim());

  return `<!doctype html>
<html lang="ja">
<head>
${head(`${p.name}｜ホームページ制作案`, t, expiry)}
</head>
<body>

<div class="notice">
  これは <b>株式会社秀</b> が作成した提案用のサンプルです。${esc(p.name)} 様の公式サイトではありません。
</div>

<header class="hero">
  <div class="hero__media">${img(hero, `${p.name}`)}</div>
  <div class="hero__body">
    <div class="wrap" style="padding:0">
      <p class="hero__kicker">${esc(p.address ? p.address.replace(/^(.{2,3}[都道府県])/, '') .slice(0,12) : '')}</p>
      <h1 class="hero__name">${esc(p.name)}</h1>
      <p class="hero__tag">${esc(p.tagline || '')}</p>
    </div>
  </div>
</header>

<section>
  <div class="wrap">
    <p class="kicker">ABOUT</p>
    <h2>${esc(p.leadTitle || 'はじめての方へ')}</h2>
    <p class="lead">${esc(p.lead || '')}</p>
    ${points ? `<div class="points">${points}</div>` : ''}
  </div>
</section>

${
  items
    ? `<section class="menu">
  <div class="wrap">
    <p class="kicker">${esc(p.itemsKicker || 'MENU')}</p>
    <h2>${esc(p.itemsTitle || 'メニュー')}</h2>
    <div class="items">${items}</div>
    <p style="margin-top:1.5rem;font-size:.8rem;color:var(--faint)">※ 内容・価格はサンプルです。実際の制作では御社の情報に差し替えます。</p>
  </div>
</section>`
    : ''
}

<section>
  <div class="wrap">
    <p class="kicker">GALLERY</p>
    <h2>${esc(p.galleryTitle || t.gallery || '店内のご案内')}</h2>
    ${galleryHtml}
  </div>
</section>

<section>
  <div class="wrap">
    <p class="kicker">INFORMATION</p>
    <h2>店舗案内</h2>
    <div class="info">${rows}</div>
    <p style="margin-top:1.5rem">
      <a href="https://www.google.com/maps/search/?api=1&query=${mapQ}" target="_blank" rel="noopener noreferrer">Googleマップで見る →</a>
    </p>
  </div>
</section>

<section class="cta">
  <div class="wrap">
    <h2>お問い合わせ</h2>
    <p>ご予約・ご相談はこちらから承ります。</p>
    <a class="cta__btn" href="tel:${esc((p.tel || '').replace(/[^0-9+]/g, ''))}">お電話でお問い合わせ</a>
  </div>
</section>

<footer>
  <div class="wrap">
    <div class="disclaimer">
      <p><strong>このページについて</strong></p>
      <p>
        株式会社秀が、${esc(p.name)} 様へのご提案のために作成したサンプルページです。
        ${esc(p.name)} 様の公式サイトではなく、検索エンジンには表示されません（noindex）。
      </p>
      <p style="margin-top:.8rem">
        掲載中の写真は ${
          p.url ? `<a href="${esc(p.url)}" target="_blank" rel="noopener noreferrer">御社サイト</a>` : '御社サイト'
        }のものを参照して表示しています（当方に保存はしておりません）。
        制作時には、御社からご提供いただいたデータに差し替えます。
      </p>
      <p style="margin-top:.8rem">
        掲載の停止をご希望の場合は
        <a href="mailto:nishi@nous-creators.com">nishi@nous-creators.com</a>
        までご連絡ください。即日削除いたします。
      </p>
      ${expiry ? `<p style="margin-top:.8rem"><strong>公開期限：${esc(expiry)}</strong>（期限を過ぎると自動的に削除されます）</p>` : ''}
    </div>
    <p>株式会社秀</p>
  </div>
</footer>

</body>
</html>`;
}

/* ── 診断レポート ─────────────────────────────── */
export function renderReport(p, diag, opts = {}) {
  const t = theme(p.industry);
  const expiry = opts.expiry || '';
  const demoPath = opts.demoPath || './';

  const levelLabel = { critical: '要改善', warn: '確認', info: '参考' };
  const levelColor = { critical: '#b64826', warn: '#a8752a', info: '#5f5c55' };

  const findings = (diag.findings || [])
    .map(
      (f) => `
    <div class="f">
      <span class="f__tag" style="color:${levelColor[f.level]};border-color:${levelColor[f.level]}">${levelLabel[f.level]}</span>
      <div>
        <p class="f__label">${esc(f.label)}</p>
        ${f.detail ? `<p class="f__detail">${esc(f.detail)}</p>` : ''}
      </div>
    </div>`
    )
    .join('');

  const checks = [
    ['スマートフォン表示（viewport）', diag.viewport],
    ['SSL（https）', diag.https],
    ['お問い合わせフォーム', diag.form],
    ['検索結果の説明文', !!diag.description],
  ]
    .map(
      ([k, ok]) =>
        `<div class="chk"><span class="chk__k">${esc(k)}</span><span class="chk__v ${ok ? 'ok' : 'ng'}">${ok ? '対応済み' : '未対応'}</span></div>`
    )
    .join('');

  return `<!doctype html>
<html lang="ja">
<head>
${head(`${p.name} 様｜サイト診断`, t, expiry)}
<style>
  .score{display:flex;align-items:baseline;gap:.6rem;margin:1.5rem 0 .5rem}
  .score__n{font-family:var(--display);font-size:3.4rem;line-height:1;font-variant-numeric:tabular-nums}
  .score__d{font-size:.9rem;color:var(--faint)}
  .f{display:grid;grid-template-columns:4.5rem 1fr;gap:1rem;padding:1.1rem 0;border-bottom:1px solid var(--rule)}
  .f__tag{font-size:.7rem;border:1px solid;padding:.15rem .4rem;height:fit-content;text-align:center;letter-spacing:.06em}
  .f__label{font-weight:700;font-size:.98rem}
  .f__detail{font-size:.88rem;color:var(--sub);margin-top:.2rem}
  .chk{display:flex;justify-content:space-between;gap:1rem;padding:.75rem 0;border-bottom:1px solid var(--rule);font-size:.9rem}
  .chk__k{color:var(--sub)}
  .chk__v{font-weight:700;white-space:nowrap}
  .chk__v.ok{color:var(--accent)}
  .chk__v.ng{color:#b64826}
  .plan{background:var(--surface);border:1px solid var(--rule);padding:1.5rem;margin-top:2rem}
  .plan__price{font-family:var(--display);font-size:2rem;letter-spacing:.02em;line-height:1.3}
  .plan__dur{font-size:.88rem;color:var(--sub);margin-top:.4rem}
  .plan ul{padding-left:1.2em;margin:1rem 0 0;font-size:.9rem;color:var(--sub)}
</style>
</head>
<body>

<div class="notice">株式会社秀 ｜ ${esc(p.name)} 様 サイト診断</div>

<section>
  <div class="wrap">
    <p class="kicker">DIAGNOSIS</p>
    <h2>${esc(p.name)} 様の<br>現在のホームページについて</h2>
    <p class="lead">${
      diag.url
        ? `<a href="${esc(diag.url)}" target="_blank" rel="noopener noreferrer">${esc(diag.url)}</a> を拝見しました。`
        : 'ホームページが見つかりませんでした。'
    }</p>

    <div class="score">
      <span class="score__n">${diag.score}</span>
      <span class="score__d">/ 100 点（機械判定）</span>
    </div>
    <p style="font-size:.85rem;color:var(--faint)">
      表示速度 ${(diag.ms / 1000).toFixed(1)} 秒 ／ ページ容量 ${(diag.bytes / 1024).toFixed(0)} KB
    </p>
  </div>
</section>

<section style="padding-top:0">
  <div class="wrap">
    <p class="kicker">CHECK</p>
    <h2>基本項目</h2>
    ${checks}
  </div>
</section>

<section style="padding-top:0">
  <div class="wrap">
    <p class="kicker">FINDINGS</p>
    <h2>気になった点</h2>
    ${findings || '<p class="lead">大きな問題は見つかりませんでした。</p>'}

    <div class="plan">
      <p class="kicker" style="margin-bottom:.4rem">ご提案</p>
      <p class="plan__price">5ページ 15万円</p>
      <p class="plan__dur">原稿・お写真をいただいてから 7営業日で公開</p>
      <ul>
        <li>ご自身で更新できます（WordPress）</li>
        <li>スマートフォン対応・お問い合わせフォーム・SSL込み</li>
        <li>修正2回まで込み。追加費用は事前に全てご提示します</li>
      </ul>
      <p style="margin-top:1.5rem">
        <a href="${esc(demoPath)}">${esc(p.name)} 様向けのトップページ案を見る →</a>
      </p>
    </div>
  </div>
</section>

<footer>
  <div class="wrap">
    <div class="disclaimer">
      <p><strong>このページについて</strong></p>
      <p>株式会社秀が作成した提案資料です。検索エンジンには表示されません（noindex）。</p>
      <p style="margin-top:.8rem">
        診断は公開されているページを1回取得して機械的に判定したものです。
        掲載の停止をご希望の場合は <a href="mailto:nishi@nous-creators.com">nishi@nous-creators.com</a> までご連絡ください。即日削除いたします。
      </p>
      ${expiry ? `<p style="margin-top:.8rem"><strong>公開期限：${esc(expiry)}</strong></p>` : ''}
    </div>
    <p>株式会社秀</p>
  </div>
</footer>

</body>
</html>`;
}

export { esc, THEMES };
