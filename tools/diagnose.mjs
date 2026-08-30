/**
 * 営業先サイトの自動診断（依存ゼロ / Node 18+）
 *
 * 相手サイトを1回だけ取得し、機械的に判定できる項目を拾う。
 * ページを保存はしない（複製しない）。画像は URL を控えるだけ。
 */

const UA =
  'Mozilla/5.0 (compatible; ShuWebAudit/1.0; +https://example.com/about-audit)';

const TIMEOUT_MS = 15000;

/** src/href を絶対URLに直す。直せなければ null */
function absolutize(src, base) {
  try {
    return new URL(src, base).href;
  } catch {
    return null;
  }
}

/** ロゴ・アイコン・計測用の1px画像など、写真として使えないものを弾く */
function looksLikePhoto(url) {
  const u = url.toLowerCase();
  if (/\.(svg|gif|ico)(\?|$)/.test(u)) return false;
  if (/(logo|icon|favicon|sprite|blank|spacer|pixel|badge|btn|button|arrow|bullet)/.test(u))
    return false;
  return /\.(jpe?g|png|webp|avif)(\?|$)/.test(u) || !/\.[a-z0-9]{2,5}(\?|$)/.test(u);
}

export async function diagnose(url) {
  const r = {
    url: url || null,
    reachable: false,
    status: null,
    https: false,
    viewport: false,
    form: false,
    ssl_redirect: false,
    title: '',
    description: '',
    ogImage: null,
    images: [],
    copyrightYear: null,
    bytes: 0,
    ms: 0,
    score: 0,
    findings: [],
    error: null,
  };

  if (!url) {
    r.error = 'サイトURLなし';
    r.findings.push({ key: 'nosite', level: 'critical', label: 'ホームページが見つかりません' });
    return r;
  }

  const t0 = Date.now();
  let html = '';
  let finalUrl = url;

  try {
    const ctrl = new AbortController();
    const timer = setTimeout(() => ctrl.abort(), TIMEOUT_MS);
    const res = await fetch(url, {
      headers: { 'User-Agent': UA, Accept: 'text/html,*/*' },
      redirect: 'follow',
      signal: ctrl.signal,
    });
    clearTimeout(timer);
    finalUrl = res.url || url;
    r.status = res.status;
    if (!res.ok) {
      // エラーページを本文として採点しないこと（403/404 の本文は診断対象ではない）
      r.ms = Date.now() - t0;
      r.error = `HTTP ${res.status}`;
      r.findings.push({
        key: 'http',
        level: 'critical',
        label: `サイトが正しく表示されません（HTTP ${res.status}）`,
      });
      return r;
    }
    const ctype = res.headers.get('content-type') || '';
    if (!/text\/html|application\/xhtml/i.test(ctype)) {
      r.ms = Date.now() - t0;
      r.error = `HTMLではありません (${ctype || '不明'})`;
      r.findings.push({ key: 'nothtml', level: 'critical', label: 'ページを読み取れませんでした' });
      return r;
    }
    html = await res.text();
    r.reachable = true;
    r.bytes = Buffer.byteLength(html, 'utf8');
  } catch (e) {
    r.error = String(e && e.message ? e.message : e);
    r.ms = Date.now() - t0;
    r.findings.push({ key: 'unreachable', level: 'critical', label: 'サイトが正しく表示されません' });
    return r;
  }

  r.ms = Date.now() - t0;
  r.url = finalUrl;
  r.https = finalUrl.startsWith('https://');

  // --- meta ---
  r.viewport = /<meta[^>]+name=["']?viewport["']?/i.test(html);
  r.form = /<form[\s>]/i.test(html) || /mailto:/i.test(html);

  const mTitle = html.match(/<title[^>]*>([\s\S]*?)<\/title>/i);
  if (mTitle) r.title = mTitle[1].replace(/\s+/g, ' ').trim().slice(0, 120);

  const mDesc = html.match(
    /<meta[^>]+name=["']?description["']?[^>]*content=["']([^"']*)["']/i
  );
  if (mDesc) r.description = mDesc[1].replace(/\s+/g, ' ').trim().slice(0, 200);

  const mOg = html.match(
    /<meta[^>]+property=["']?og:image["']?[^>]*content=["']([^"']+)["']/i
  );
  if (mOg) r.ogImage = absolutize(mOg[1], finalUrl);

  // --- copyright year ---
  const mYear = html.match(/(?:©|&copy;|Copyright)[^<>]{0,60}?((?:19|20)\d{2})/i);
  if (mYear) r.copyrightYear = Number(mYear[1]);

  // --- images (URLを控えるだけ。保存はしない) ---
  const seen = new Set();
  const imgs = [];
  if (r.ogImage && looksLikePhoto(r.ogImage)) {
    imgs.push(r.ogImage);
    seen.add(r.ogImage);
  }
  const re = /<img[^>]+(?:data-src|data-lazy-src|src)=["']([^"']+)["']/gi;
  let m;
  while ((m = re.exec(html)) !== null) {
    const abs = absolutize(m[1], finalUrl);
    if (!abs || seen.has(abs) || !looksLikePhoto(abs)) continue;
    seen.add(abs);
    imgs.push(abs);
    if (imgs.length >= 12) break;
  }
  r.images = imgs;

  // --- 判定 ---
  const thisYear = new Date().getFullYear();
  const f = r.findings;

  if (!r.viewport)
    f.push({
      key: 'viewport',
      level: 'critical',
      label: 'スマートフォン表示の指定（viewport）がありません',
      detail: 'PC向けのまま縮小表示されるため、文字が読めない状態になります。',
    });

  if (!r.https)
    f.push({
      key: 'https',
      level: 'critical',
      label: 'SSL（https）に対応していません',
      detail: 'ブラウザに「保護されていない通信」と表示されます。',
    });

  if (!r.form)
    f.push({
      key: 'form',
      level: 'warn',
      label: 'お問い合わせフォームが見当たりません',
      detail: '電話のみだと、営業時間外の問い合わせを取りこぼします。',
    });

  if (r.copyrightYear && thisYear - r.copyrightYear >= 2)
    f.push({
      key: 'stale',
      level: 'warn',
      label: `表記が ${r.copyrightYear} 年のまま更新されていません`,
      detail: '閲覧者に「今も営業しているのか」という不安を与えます。',
    });

  if (r.ms >= 3000)
    f.push({
      key: 'speed',
      level: 'warn',
      label: `表示までに ${(r.ms / 1000).toFixed(1)} 秒かかっています`,
      detail: '3秒を超えると離脱が大きく増えます。',
    });

  if (!r.description)
    f.push({
      key: 'description',
      level: 'info',
      label: '検索結果に出る説明文（description）が未設定です',
    });

  if (r.images.length === 0)
    f.push({ key: 'images', level: 'info', label: '写真がほとんど使われていません' });

  // --- スコア（100点満点。低いほど改善余地が大きい） ---
  let s = 100;
  for (const x of f) s -= x.level === 'critical' ? 25 : x.level === 'warn' ? 12 : 5;
  r.score = Math.max(0, s);

  return r;
}
