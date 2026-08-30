# 営業先ごとのデモサイト生成ツール

営業先1社ごとに「トップページ案」と「サイト診断レポート」を自動生成し、
URL を差し込んだメール下書きまで出力する。

依存パッケージなし。Node.js 18 以上があれば動く。

---

## 使い方

```bash
# 1. 営業先リストを用意（サンプルをコピーして書き換える）
cp data/prospects.sample.json data/prospects.json

# 2. 生成
node tools/build.mjs --base https://kawagoe.pages.dev

# 3. 手元で確認
python3 -m http.server -d dist 8000
```

### オプション

| | 既定値 | 説明 |
|---|---|---|
| `--data` | `data/prospects.json` | 営業先リスト |
| `--out` | `dist` | 出力先 |
| `--days` | `14` | 公開期限（日数）。メールと各ページに明記される |
| `--base` | （なし） | 公開URLの先頭。メール下書きの絶対URLに使う |

### 出力

```
dist/<slug>/index.html    デモサイト（トップ1枚）
dist/<slug>/report.html   サイト診断レポート
dist/index.html           送付リスト（社内用・スコア順）
dist/robots.txt           全ページ noindex
dist/_headers             Cloudflare Pages 用 X-Robots-Tag
out/emails.md             URL差し込み済みのメール下書き
```

`dist/` `out/` `data/prospects.json` は営業先の情報を含むため git 管理外。

---

## 営業先リストの書き方

`data/prospects.sample.json` に3業種ぶんの記入例がある。

| キー | 必須 | 内容 |
|---|---|---|
| `slug` | ○ | URLに使う識別子（半角英数字とハイフン） |
| `name` | ○ | 店名・社名 |
| `industry` | ○ | `washoku` / `salon` / `seitai` のいずれか。配色と書体が変わる |
| `url` | | 現在のサイト。診断と画像参照に使う。空なら「サイトなし」として扱う |
| `address` `tel` `hours` | | 店舗案内に表示 |
| `tagline` `leadTitle` `lead` | | ヒーローと導入文 |
| `points` | | `{title, body}` を3つ |
| `items` | | `{name, price, note}` を4〜6つ |
| `galleryTitle` | | 未指定なら業種ごとの既定値 |

`industry` を増やす場合は `tools/template.mjs` の `THEMES` に追加する。

---

## 診断の内容

営業先のサイトを **1回だけ** 取得し、機械的に判定できる項目を拾う。
ページの保存はしない。

- viewport（スマートフォン表示の指定）の有無
- SSL（https）対応
- お問い合わせフォームの有無
- Copyright 表記の年（2年以上古ければ指摘）
- 表示までの時間、ページ容量
- description の有無
- 写真として使える画像のURL（ロゴ・アイコン・GIFは除外）

100点満点でスコア化する。**低いほど改善余地が大きく、提案が刺さりやすい。**
`dist/index.html` はスコアの低い順に並ぶので、上から順に送る。

HTTP エラーや HTML でない応答は、内容を採点せずエラーとして扱う。

---

## 画像の扱い

デモサイトの写真は、**営業先サイトの画像URLを直接参照する（ホットリンク）**。
自分側にコピーを保存しないので、複製にはあたらない。

- 読み込めなかった場合は「お店のお写真がここに入ります」の枠に自動で置き換わる
- `referrerpolicy="no-referrer"` を付けている
- フッターに参照元と「ご連絡いただければ即日削除します」を必ず明記している

**画像をダウンロードして自分のサーバーに置くことはしない。** 性質が変わる。

---

## 公開

Cloudflare Pages（無料）を推奨。`dist/` をそのまま上げる。

```bash
npx wrangler pages deploy dist --project-name kawagoe
```

`dist/_headers` により全ページに `X-Robots-Tag: noindex` が付く。
各ページの `<meta name="robots">` と `robots.txt` と合わせて三重に担保している。

---

## 運用上の約束

1. **公開期限を守る。** 期限が来たらデプロイから消す。メールに書いた以上、守る
2. **削除依頼が来たら即日消す。** 理由は聞かない
3. **メールの「拝見しました」の一文は、1通ずつ自分の言葉で書き直す。**
   生成した文章をそのまま送ると、テンプレだと見抜かれて返信率が落ちる
4. 特定電子メール法の記載4点（送信者名・住所・配信停止先・拒否できる旨）は
   メール下書きのフッターに入っている。**住所は必ず埋める**
5. 新しいドメインからいきなり大量送信しない。
   SPF / DKIM / DMARC を設定し、1日5通から徐々に増やす

---

## 削除の手順

```bash
# 特定の1社だけ消す
rm -rf dist/<slug> && npx wrangler pages deploy dist --project-name kawagoe

# 全部消す
npx wrangler pages project delete kawagoe
```
