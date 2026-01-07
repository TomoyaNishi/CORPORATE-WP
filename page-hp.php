<?php
/**
 * Template Name: hp
 * Description: Service detail page - HP Production (CSS separated, JS inline)
 */
get_header();
?>

<main id="main" class="site-main service-detail">

  <!-- FV -->
  <div class="service-detail-hero fade-up">
    <a href="<?php echo esc_url(home_url('/service/')); ?>" class="service-detail-back-link">← サービス一覧へ戻る</a>

    <div class="service-detail-hero-bg">
      <img
        src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=2068&auto=format&fit=crop"
        alt="<?php echo esc_attr__('Web Architecture & Structure', 'nous'); ?>"
        loading="eager"
        decoding="async"
      >
    </div>

    <div class="service-detail-hero-content">
      <span class="service-detail-subtitle">HP PRODUCTION</span>
      <h1 class="service-detail-title">HP制作について</h1>
      <p class="service-detail-hero-lead font-sans">
        作る前に、「作らなくていいか」を考える。
      </p>
    </div>
  </div>

  <!-- Intro -->
  <section class="section container fade-up">
    <p class="service-detail-intro-lead">
      見た目を整えるだけでは、意味がありません。<br>
      問い合わせや広告の
      <span class="service-detail-text-gold service-detail-underline">
        「受け皿」として機能しなければ、<br>ただの飾りになってしまいます。
      </span>
    </p>

    <p class="service-detail-intro-desc">
      NOUSは、やみくもに作りません。<br>
      本当に必要なページだけを、必要な形で提案します。
    </p>
  </section>

  <!-- Concerns -->
  <section class="section service-detail-soft-bg">
    <div class="container fade-up">
      <div class="service-detail-center">
        <span class="service-detail-kicker text-gold font-sans">CONCERNS</span>
        <h2 class="mb-md">よくあるご相談</h2>
      </div>

      <div class="service-detail-concerns-grid service-detail-concerns-grid--hp">
        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="monitor-x"></i></div>
            <span class="service-detail-concern-label">CASE 01</span>
          </div>
          <p class="service-detail-concern-text">ホームページはあるが、<br>全く問い合わせが来ない。<br>仕事をしていない状態。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="refresh-cw"></i></div>
            <span class="service-detail-concern-label">CASE 02</span>
          </div>
          <p class="service-detail-concern-text">デザインが古いが、<br>どこをどう作り直すべきか<br>判断がつかない。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="mouse-pointer-2"></i></div>
            <span class="service-detail-concern-label">CASE 03</span>
          </div>
          <p class="service-detail-concern-text">広告を出したいが、<br>今のサイトが受け皿として<br>適切か不安がある。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Philosophy -->
  <section class="section container fade-up">
    <div class="service-detail-center">
      <span class="service-detail-kicker text-gold font-sans">PHILOSOPHY</span>
      <h2 class="mb-md">NOUSの考え方</h2>
      <p>HPは、目的が決まって初めて意味を持ちます。<br>誰に・何を伝え・どう動いてもらうかを整理したうえで制作します。</p>
    </div>

    <div class="service-detail-philosophy-wrapper service-detail-center">
      <h3>成果を出すための「正しい順番」</h3>
      <p class="font-sans service-detail-muted">
        デザインは最終工程です。まずは「誰に何を」から始めます。
      </p>

      <div class="service-detail-diagram-container font-sans">
        <div class="service-detail-diagram-block service-detail-hp-step1">
          <span class="service-detail-step-num">STEP 1 : 目的の定義</span>
          <div class="service-detail-ph-step-title">誰に・何を伝えるか</div>
          <div class="service-detail-ph-step-desc">ターゲット選定 / 訴求軸の整理</div>
        </div>

        <div class="service-detail-diagram-arrow"><i data-lucide="arrow-down"></i></div>

        <div class="service-detail-diagram-block service-detail-hp-step2">
          <span class="service-detail-step-num">STEP 2 : 導線設計</span>
          <div class="service-detail-ph-step-title">どう動いてもらうか</div>
          <div class="service-detail-ph-step-desc">サイト構成 / ワイヤーフレーム作成</div>
        </div>

        <div class="service-detail-diagram-arrow"><i data-lucide="arrow-down"></i></div>

        <div class="service-detail-diagram-block service-detail-hp-step3">
          <span class="service-detail-step-num">STEP 3 : 実装</span>
          <div class="service-detail-ph-step-title">ビジュアル化</div>
          <div class="service-detail-ph-step-desc">デザイン / コーディング / 公開</div>
        </div>
      </div>

      <p class="service-detail-philosophy-note">
        整理の結果、LP1枚で十分な場合や、今は作るべきではない場合は、<br>
        <strong class="text-accent">「作らない」という選択肢</strong>も含めてご提案します。
      </p>
    </div>
  </section>

  <!-- Workflow -->
  <section class="section service-detail-white-bg">
    <div class="container fade-up">
      <div class="service-detail-center mb-lg">
        <span class="service-detail-kicker text-gold font-sans">WORKFLOW</span>
        <h2 class="mb-md">Webサイト制作ワークフロー</h2>
        <p>戦略策定から運用・保守まで。<br>一気通貫でサポートします。</p>
      </div>

      <div class="service-detail-workflow-wrapper">

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">01</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">ヒアリング・要件定義 <span class="service-detail-step-en">Hearing & Strategy</span></h3>
              <i data-lucide="map" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">プロジェクトのゴールを共有し、制作の全体像を決定するフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>現状分析と目的の明確化</h4>
                <ul>
                  <li>サイト制作の目的決定（集客・採用等）</li>
                  <li>ターゲット層（ペルソナ）の設定</li>
                  <li>競合サイトの調査・リサーチ</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>要件・仕様の策定</h4>
                <ul>
                  <li>必要な機能の洗い出し</li>
                  <li>概算スケジュールと予算のすり合わせ</li>
                  <li>サイトマップ（ページ構成図）の作成</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">02</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">構成・ワイヤーフレーム作成 <span class="service-detail-step-en">Planning</span></h3>
              <i data-lucide="layout" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">デザインに入る前に、Webサイトの「骨組み」を作る非常に重要なフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>ワイヤーフレーム（設計図）の作成</h4>
                <ul>
                  <li>各ページのレイアウト設計</li>
                  <li>導線設計（ゴールへ誘導する流れ）</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>コンテンツ企画・環境準備</h4>
                <ul>
                  <li>掲載文章の作成または依頼</li>
                  <li>写真素材・ロゴデータの準備</li>
                  <li>ドメイン・サーバーの選定と契約</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">03</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">デザイン制作 <span class="service-detail-step-en">Design</span></h3>
              <i data-lucide="palette" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">骨組みに色や装飾を加え、目に見える形にするフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>トップページ・下層ページデザイン</h4>
                <ul>
                  <li>トップページのデザイン案提出</li>
                  <li>トーン＆マナーの決定</li>
                  <li>下層ページへのデザイン展開</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>スマホ対応・確認修正</h4>
                <ul>
                  <li>スマホで見やすいUI/UXデザイン</li>
                  <li>デザインカンプ（完成見本）のチェック</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">04</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">実装・コーディング <span class="service-detail-step-en">Development</span></h3>
              <i data-lucide="code" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">決定したデザインを、Webブラウザ上で動くようにプログラミングするフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>コーディング・機能実装</h4>
                <ul>
                  <li>HTML / CSS / JavaScript コーディング</li>
                  <li>アニメーション（動き）の実装</li>
                  <li>フォーム機能、自動返信メールの設定</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>CMS（WordPress等）の構築</h4>
                <ul>
                  <li>お知らせ・ブログ更新機能の実装</li>
                  <li>管理画面のカスタマイズ</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">05</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">テスト・公開 <span class="service-detail-step-en">Launch</span></h3>
              <i data-lucide="rocket" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">一般公開する前の最終チェックを行い、Webサイトをリリースするフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>動作検証（デバッグ）</h4>
                <ul>
                  <li>各ブラウザ・スマホ実機での表示確認</li>
                  <li>リンク切れ、誤字脱字の最終チェック</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>公開作業</h4>
                <ul>
                  <li>基本的なSEO対策（タグ設定など）</li>
                  <li>解析ツールの設定</li>
                  <li>本番環境へのアップロード</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">06</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">運用・保守 <span class="service-detail-step-en">Maintenance</span></h3>
              <i data-lucide="shield-check" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">公開後のサイトを健全に保ち、育てていくフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>保守管理・セキュリティ対策</h4>
                <ul>
                  <li>CMSやプラグインの定期アップデート</li>
                  <li>データの定期バックアップ</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>アクセス解析・改善提案</h4>
                <ul>
                  <li>月間のアクセス数レポート作成</li>
                  <li>ユーザーの動きに合わせた改修提案</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Matching -->
  <section class="section container fade-up">
    <div class="service-detail-center">
      <h2 class="mb-md">パートナーとしての適合性</h2>
    </div>

    <div class="service-detail-match-container">
      <div class="service-detail-match-col service-detail-ng">
        <h3 class="service-detail-match-title">ご期待に添えない場合</h3>
        <ul class="service-detail-match-list">
          <li>とにかくデザイン（見た目）だけ良くしたい</li>
          <li>戦略はどうでもいいから安く作りたい</li>
          <li>更新や運用は全く考えていない</li>
        </ul>
        <p class="service-detail-match-note">
          ※ テンプレートに当てはめるだけの制作会社様の方が<br>コストメリットが出る可能性があります。
        </p>
      </div>

      <div class="service-detail-match-col service-detail-ok">
        <div class="service-detail-match-badge">RECOMMENDED</div>
        <h3 class="service-detail-match-title service-detail-match-title-ok">NOUSが向いている方</h3>
        <ul class="service-detail-match-list">
          <li>HPをどうビジネスに活かせばいいか分からない</li>
          <li>広告運用とセットで効果を最大化したい</li>
          <li>「作る」ことより「成果」を重視したい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 御社の事業課題を整理するところから<br>伴走させていただきます。
        </p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="service-detail-cta fade-up">
    <h2 class="mb-md">まずは、作るべきかどうかの相談から</h2>
    <p>
      HPを作るべきか、リニューアルすべきか。<br>
      そこから正直にお話しします。
    </p>
    <p class="service-detail-cta-note">※ 相談 ＝ 依頼ではありません。</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-main">無料で相談する</a>
  </div>

</main>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    if (window.lucide && typeof window.lucide.createIcons === 'function') {
      window.lucide.createIcons();
    }
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
  });
</script>

<?php get_footer(); ?>
