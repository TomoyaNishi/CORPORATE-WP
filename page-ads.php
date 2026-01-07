<?php
/**
 * Template Name: service-ads
 * Description: Service detail page - Ads Management (CSS separated, JS inline)
 */
get_header();
?>

<main id="main" class="site-main service-detail">

  <!-- FV -->
  <div class="service-detail-hero fade-up">
    <a href="<?php echo esc_url(home_url('/service/')); ?>" class="service-detail-back-link">← サービス一覧へ戻る</a>

    <div class="service-detail-hero-bg">
      <img
        src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop"
        alt="<?php echo esc_attr__('Strategy Architecture', 'nous'); ?>"
        loading="eager"
        decoding="async"
      >
    </div>

    <div class="service-detail-hero-content">
      <span class="service-detail-subtitle">ADS MANAGEMENT</span>
      <h1 class="service-detail-title">広告運用について</h1>
      <p class="service-detail-hero-lead font-sans">
        回す前に、「回す意味」を考える。
      </p>
    </div>
  </div>

  <!-- Intro -->
  <section class="section container fade-up">
    <p class="service-detail-intro-lead">
      広告は、正しく使えば強力な手段です。<br>
      しかし、順番を間違えると、<br>
      <span class="service-detail-text-gold service-detail-underline">ただお金が減るだけの消費</span>になります。
    </p>

    <p class="service-detail-intro-desc">
      だからNOUSは、いきなり広告を回しません。<br>
      まずは事業の健康診断から始めます。
    </p>
  </section>

  <!-- Concerns -->
  <section class="section service-detail-soft-bg">
    <div class="container fade-up">
      <div class="service-detail-center">
        <span class="service-detail-kicker text-gold font-sans">CONCERNS</span>
        <h2 class="mb-md">よくあるご相談</h2>
      </div>

      <div class="service-detail-concerns-grid">

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap">
              <i data-lucide="help-circle"></i>
            </div>
            <span class="service-detail-concern-label">CASE 01</span>
          </div>
          <p class="service-detail-concern-text">
            広告をやった方がいいのは<br>なんとなく分かるけど、<br>失敗しそうで不安。
          </p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap">
              <i data-lucide="coins"></i>
            </div>
            <span class="service-detail-concern-label">CASE 02</span>
          </div>
          <p class="service-detail-concern-text">
            そもそも、いくらの予算を<br>何に使えば正解なのか<br>見当がつかない。
          </p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap">
              <i data-lucide="bar-chart-2"></i>
            </div>
            <span class="service-detail-concern-label">CASE 03</span>
          </div>
          <p class="service-detail-concern-text">
            成果を聞かれても、<br>「CPAが…」と言葉が詰まり<br>社内で説明できない。
          </p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap">
              <i data-lucide="message-square-off"></i>
            </div>
            <span class="service-detail-concern-label">CASE 04</span>
          </div>
          <p class="service-detail-concern-text">
            前に頼んだ代理店は<br>専門用語ばかりで、<br>話が噛み合わなかった。
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- Philosophy -->
  <section class="section container fade-up">
    <div class="service-detail-center">
      <span class="service-detail-kicker text-gold font-sans">PHILOSOPHY</span>
      <h2 class="mb-md">NOUSの考え方</h2>
      <p>広告は、魔法ではありません。<br>事業・利益・導線が整理されていない状態で回しても、成果は安定しません。</p>
    </div>

    <div class="service-detail-philosophy-wrapper service-detail-center">
      <h3>成果を出すための「正しい順番」</h3>
      <p class="font-sans service-detail-muted">
        上流から整理することで、広告の効果は最大化されます。
      </p>

      <div class="service-detail-diagram-container font-sans">

        <div class="service-detail-diagram-block service-detail-block-step1">
          <span class="service-detail-step-num">STEP 1 : 上流設計</span>
          <div class="service-detail-ph-step-title">事業構造の整理</div>
          <div class="service-detail-ph-step-desc">利益率 / LTV / ターゲット設定</div>
        </div>

        <div class="service-detail-diagram-arrow"><i data-lucide="arrow-down"></i></div>

        <div class="service-detail-diagram-block service-detail-block-step2">
          <span class="service-detail-step-num">STEP 2 : 導線設計</span>
          <div class="service-detail-ph-step-title">導線・受皿の整備</div>
          <div class="service-detail-ph-step-desc">HP改善 / LP制作 / オファー設計</div>
        </div>

        <div class="service-detail-diagram-arrow"><i data-lucide="arrow-down"></i></div>

        <div class="service-detail-diagram-block service-detail-block-step3">
          <span class="service-detail-step-num">STEP 3 : 実行</span>
          <div class="service-detail-ph-step-title">広告配信</div>
          <div class="service-detail-ph-step-desc">ブーストをかける / 運用・改善</div>
        </div>

      </div>

      <p class="service-detail-philosophy-note">
        NOUSでは、土台となるSTEP 1, 2が固まっていない場合、<br>
        <strong class="text-accent">「今は広告を打つべきではない」</strong>という判断も含めてご提案します。
      </p>
    </div>
  </section>

  <!-- Workflow -->
  <section class="section service-detail-white-bg">
    <div class="container fade-up">
      <div class="service-detail-center mb-lg">
        <span class="service-detail-kicker text-gold font-sans">WORKFLOW</span>
        <h2 class="mb-md">導入・運用の流れ</h2>
        <p>戦略立案から実行、改善まで。<br>一気通貫でサポートします。</p>
      </div>

      <div class="service-detail-workflow-wrapper">

        <!-- STEP 1 -->
        <div class="service-detail-step-row">
          <div class="service-detail-step-marker">
            <div class="service-detail-step-circle">01</div>
          </div>

          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">ヒアリング・戦略立案 <span class="service-detail-step-en">Planning</span></h3>
              <i data-lucide="map" class="service-detail-step-icon"></i>
            </div>

            <p class="service-detail-step-desc">広告配信の目的を明確にし、最も効果的な媒体とプランを策定するフェーズです。</p>

            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>現状分析と課題の抽出</h4>
                <ul>
                  <li>現在のマーケティング施策のヒアリング</li>
                  <li>競合他社のリサーチ</li>
                  <li>KPI・KGIの設定 (目標CPA/ROAS)</li>
                </ul>
              </div>

              <div class="service-detail-detail-block">
                <h4>ターゲット選定・媒体選定</h4>
                <ul>
                  <li>ペルソナ設計（年齢・性別・興味関心）</li>
                  <li>Instagram, X, Facebook, TikTok, LINE等から選定</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- STEP 2 -->
        <div class="service-detail-step-row">
          <div class="service-detail-step-marker">
            <div class="service-detail-step-circle">02</div>
          </div>

          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">アカウント構築・初期設定 <span class="service-detail-step-en">Setup</span></h3>
              <i data-lucide="settings" class="service-detail-step-icon"></i>
            </div>

            <p class="service-detail-step-desc">広告を配信するための土台を作る、技術的かつ重要なフェーズです。</p>

            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>広告アカウントの開設</h4>
                <ul>
                  <li>ビジネスマネージャーの設定</li>
                  <li>各媒体のアカウント開設代行・連携</li>
                </ul>
              </div>

              <div class="service-detail-detail-block">
                <h4>タグ・計測ツールの設置</h4>
                <ul>
                  <li>計測用タグ（Pixel等）の発行と設置</li>
                  <li>Google Analytics等との連携確認</li>
                  <li>ドメイン認証・イベント設定</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- STEP 3 -->
        <div class="service-detail-step-row">
          <div class="service-detail-step-marker">
            <div class="service-detail-step-circle">03</div>
          </div>

          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">クリエイティブ制作・入稿 <span class="service-detail-step-en">Production</span></h3>
              <i data-lucide="pen-tool" class="service-detail-step-icon"></i>
            </div>

            <p class="service-detail-step-desc">ユーザーの目に触れる広告素材を作成し、システムにセットするフェーズです。</p>

            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>広告クリエイティブ制作</h4>
                <ul>
                  <li>バナー画像、ショート動画の制作</li>
                  <li>訴求軸（キャッチコピー）のライティング</li>
                  <li>複数パターンによるA/Bテスト準備</li>
                </ul>
              </div>

              <div class="service-detail-detail-block">
                <h4>入稿作業（セッティング）</h4>
                <ul>
                  <li>キャンペーン構造作成・予算設定</li>
                  <li>配信前最終チェック・審査承認確認</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- STEP 4 -->
        <div class="service-detail-step-row">
          <div class="service-detail-step-marker">
            <div class="service-detail-step-circle">04</div>
          </div>

          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">配信開始・運用調整 <span class="service-detail-step-en">Operation</span></h3>
              <i data-lucide="activity" class="service-detail-step-icon"></i>
            </div>

            <p class="service-detail-step-desc">広告開始後、日々のデータを監視しながら効果を最大化させるメインフェーズです。</p>

            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>デイリーモニタリング</h4>
                <ul>
                  <li>予算消化状況の確認</li>
                  <li>CTR（クリック率）、CVR（獲得率）の推移チェック</li>
                </ul>
              </div>

              <div class="service-detail-detail-block">
                <h4>改善施策の実行</h4>
                <ul>
                  <li>A/Bテストの検証と勝ちパターンの選定</li>
                  <li>ターゲティングや入札単価の調整</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- STEP 5 -->
        <div class="service-detail-step-row">
          <div class="service-detail-step-marker">
            <div class="service-detail-step-circle service-detail-step-circle-last">05</div>
          </div>

          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">レポーティング・定例会 <span class="service-detail-step-en">Reporting</span></h3>
              <i data-lucide="file-text" class="service-detail-step-icon"></i>
            </div>

            <p class="service-detail-step-desc">結果を振り返り、次のアクションプランを提示するフェーズです。</p>

            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>月次レポートの作成</h4>
                <ul>
                  <li>数値結果の集計と可視化</li>
                  <li>良かった点、悪かった点の要因分析</li>
                </ul>
              </div>

              <div class="service-detail-detail-block">
                <h4>定例ミーティング</h4>
                <ul>
                  <li>運用結果の報告と次月の施策提案</li>
                  <li>PDCAサイクルの実行</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /workflow -->
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
          <li>とにかく安く広告を回したい</li>
          <li>丸投げしたい（思考したくない）</li>
          <li>細かい説明や報告はいらない</li>
          <li>目先の数字さえ良ければいい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 作業代行のみをご希望の場合は、<br>格安の代行会社様の方が合うかもしれません。
        </p>
      </div>

      <div class="service-detail-match-col service-detail-ok">
        <div class="service-detail-match-badge">RECOMMENDED</div>
        <h3 class="service-detail-match-title service-detail-match-title-ok">NOUSが向いている方</h3>
        <ul class="service-detail-match-list">
          <li>事業の成長を本気で考えている</li>
          <li>悪い結果も含めて、正直に報告してほしい</li>
          <li>「なぜ？」を共有しながら進めたい</li>
          <li>社内にマーケティングの知見を蓄積したい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ クライアント様の「参謀」として、<br>二人三脚で運用することを得意としています。
        </p>
      </div>

    </div>
  </section>

  <!-- CTA -->
  <div class="service-detail-cta fade-up">
    <h2 class="mb-md">まずは、整理するところから</h2>
    <p>
      広告をやるかどうかも含めて、<br>
      正直にお話しします。
    </p>
    <p class="service-detail-cta-note">※ 相談 ＝ 依頼ではありません。</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-main">無料で相談する</a>
  </div>

</main>

<!-- Lucide -->
<script src="https://unpkg.com/lucide@latest"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    if (window.lucide && typeof window.lucide.createIcons === 'function') {
      window.lucide.createIcons();
    }

    const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
  });
</script>

<?php get_footer(); ?>