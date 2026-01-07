<?php
/**
 * Template Name: ec
 * Description: Service detail page - EC Mall Management (Chart.js 2 pies)
 */
get_header();
?>

<main id="main" class="site-main service-detail service-detail--ec">

  <!-- FV -->
  <div class="service-detail-hero fade-up">
    <a href="<?php echo esc_url(home_url('/service/')); ?>" class="service-detail-back-link">← サービス一覧へ戻る</a>

    <div class="service-detail-hero-bg">
      <img
        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2070&auto=format&fit=crop"
        alt="<?php echo esc_attr__('Logistics and Management', 'nous'); ?>"
        loading="eager"
        decoding="async"
      >
    </div>

    <div class="service-detail-hero-content">
      <span class="service-detail-subtitle">EC MANAGEMENT</span>
      <h1 class="service-detail-title">ECモール運用について</h1>
      <p class="service-detail-hero-lead font-sans">
        全部やる必要はない。<br>今、勝てる一点を突く。
      </p>
    </div>
  </div>

  <!-- Intro -->
  <section class="section container fade-up">
    <p class="service-detail-intro-lead">
      ECは、やることが多すぎて迷子になりやすい分野です。<br>
      広告、SEO、イベント、メルマガ、商品改善、配送…<br>
      <span class="service-detail-text-gold service-detail-underline">
        全てを80点にしようとすると、リソースが枯渇します。
      </span>
    </p>
    <p class="service-detail-intro-desc">
      NOUSは、あなたのリソースを「守る」ために、<br>
      やらないことを決めます。
    </p>
  </section>

  <!-- Concerns -->
  <section class="section service-detail-soft-bg">
    <div class="container fade-up">
      <div class="service-detail-center">
        <span class="service-detail-kicker text-gold font-sans">CONCERNS</span>
        <h2 class="mb-md">よくあるご相談</h2>
      </div>

      <div class="service-detail-concerns-grid service-detail-concerns-grid--ec">
        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="list-x"></i></div>
            <span class="service-detail-concern-label">CASE 01</span>
          </div>
          <p class="service-detail-concern-text">施策の優先順位が分からず、<br>とりあえず全部に手を付けて<br>中途半端になっている。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="activity"></i></div>
            <span class="service-detail-concern-label">CASE 02</span>
          </div>
          <p class="service-detail-concern-text">楽天スーパーSALEや<br>Amazonのイベント対応に<br>毎回振り回されている。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="package-x"></i></div>
            <span class="service-detail-concern-label">CASE 03</span>
          </div>
          <p class="service-detail-concern-text">広告費ばかりが増えて、<br>利益が残らない体質に<br>なってしまっている。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Philosophy -->
  <section class="section container fade-up">
    <div class="service-detail-center">
      <span class="service-detail-kicker text-gold font-sans">PHILOSOPHY</span>
      <h2 class="mb-md">NOUSの考え方</h2>
      <p>売上フェーズによって、やるべきことは変わります。<br>あれもこれもではなく、今やるべき1〜2点に絞ります。</p>
    </div>

    <div class="service-detail-philosophy-wrapper service-detail-center service-detail-philosophy-wrapper--ec">
      <h3>リソースの「選択と集中」</h3>
      <p class="font-sans service-detail-muted">薄く広くではなく、一点突破で壁を壊します。</p>

      <div class="service-detail-charts-row service-detail-charts-row--ec">
        <!-- Before -->
        <div class="service-detail-chart-box">
          <h4 class="service-detail-chart-title">一般的な運用（分散）</h4>
          <div class="service-detail-chart-canvas-wrap">
            <canvas id="chartBefore"></canvas>
          </div>
          <p class="service-detail-chart-note font-sans">全てが中途半端で<br>成果が出ない</p>
        </div>

        <div class="service-detail-arrow-separator" aria-hidden="true">
          <i data-lucide="arrow-right" class="service-detail-arrow-icon"></i>
        </div>

        <!-- After -->
        <div class="service-detail-chart-box">
          <h4 class="service-detail-chart-title service-detail-chart-title--accent">NOUSの運用（集中）</h4>
          <div class="service-detail-chart-canvas-wrap">
            <canvas id="chartAfter"></canvas>
          </div>
          <p class="service-detail-chart-note service-detail-chart-note--accent font-sans">コア業務に集中し<br>最短で成果を出す</p>
        </div>
      </div>

      <div class="service-detail-philosophy-text-block">
        <p>
          立ち上げ期に広告を打っても、商品ページの魅力がなければ売れません。<br>
          商品力があっても、露出がなければ知られません。<br><br>
          NOUSは、現在のフェーズにおける<strong>「ボトルネック」</strong>を特定し、<br>
          そこにリソースを一点集中させることで、<br>
          最小の労力で最大の売上アップを狙います。
        </p>
      </div>
    </div>
  </section>

  <!-- Workflow -->
  <section class="section service-detail-white-bg">
    <div class="container fade-up">
      <div class="service-detail-center mb-lg">
        <span class="service-detail-kicker text-gold font-sans">WORKFLOW</span>
        <h2 class="mb-md">ECモール構築・運用ワークフロー</h2>
        <p>戦略策定から運用・改善まで。<br>一気通貫でサポートします。</p>
      </div>

      <div class="service-detail-workflow-wrapper">

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">01</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">市場調査・戦略立案 <span class="service-detail-step-en">Research & Strategy</span></h3>
              <i data-lucide="bar-chart" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">どのモールに出店するか、競合に対してどう勝つかを決めるフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>モール選定・プラン決定</h4>
                <ul>
                  <li>商材との相性診断（Amazon, 楽天など）</li>
                  <li>損益シミュレーション（出店料、物流費）</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>競合調査・店舗コンセプト</h4>
                <ul>
                  <li>競合の価格帯・配送スピードリサーチ</li>
                  <li>差別化ポイント・ターゲット層の設定</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">02</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">店舗構築・デザイン <span class="service-detail-step-en">Store Build</span></h3>
              <i data-lucide="store" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">お客様を迎え入れるための売り場を作るフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>アカウント開設・各種申請</h4>
                <ul>
                  <li>出店審査サポート・配送設定</li>
                  <li>決済方法・規約の登録</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>TOPページ制作・スマホ最適化</h4>
                <ul>
                  <li>モール仕様に合わせたデザイン制作</li>
                  <li>スマホユーザーに見やすいUI設計</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">03</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">商品登録・商品ページ制作 <span class="service-detail-step-en">Product Listing</span></h3>
              <i data-lucide="shopping-bag" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">売上の8割を決めると言われる最重要フェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>「ささげ」業務</h4>
                <ul>
                  <li>商品撮影（白背景、イメージカット）</li>
                  <li>採寸・商品説明文のライティング</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>モール内SEO・LP制作</h4>
                <ul>
                  <li>検索キーワードを盛り込んだ商品名設定</li>
                  <li>転換率（CVR）を高める商品ページ作成</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">04</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">プロモーション・広告運用 <span class="service-detail-step-en">Promotion & Ads</span></h3>
              <i data-lucide="megaphone" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">アクセスを集め、初動の売上を作るフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>検索連動型広告（RPP等）</h4>
                <ul>
                  <li>キーワード選定と入札単価調整</li>
                  <li>ROAS（費用対効果）のチューニング</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>イベント対策・メルマガ</h4>
                <ul>
                  <li>スーパーSALE等のイベント準備</li>
                  <li>リピーター向けクーポン・メルマガ配信</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">05</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">受注管理・カスタマーサポート <span class="service-detail-step-en">Operation & CS</span></h3>
              <i data-lucide="headphones" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">日々の店舗運営を円滑に回し、ファンを増やすフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>受注処理・在庫連携</h4>
                <ul>
                  <li>注文確認・出荷指示</li>
                  <li>在庫切れ防止管理</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>レビュー管理・問い合わせ対応</h4>
                <ul>
                  <li>レビュー促進・低評価対応</li>
                  <li>ユーザー質問への迅速な回答</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">06</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">分析・改善 <span class="service-detail-step-en">Analysis & Growth</span></h3>
              <i data-lucide="trending-up" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">データを分析し、さらなる売上拡大を目指すフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>月次レポート作成</h4>
                <ul>
                  <li>アクセス・転換率・客単価の推移</li>
                  <li>広告パフォーマンスの振り返り</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>改善施策・企画立案</h4>
                <ul>
                  <li>検索順位チェックと改善提案</li>
                  <li>特集ページ（母の日等）の企画</li>
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
          <li>EC運用を全て丸投げしたい</li>
          <li>思考停止で作業だけしてほしい</li>
          <li>自社にノウハウを貯める気がない</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 単なる作業代行をお探しの場合は、<br>他の代行会社様の方が合う可能性があります。
        </p>
      </div>

      <div class="service-detail-match-col service-detail-ok">
        <div class="service-detail-match-badge">RECOMMENDED</div>
        <h3 class="service-detail-match-title service-detail-match-title-ok">NOUSが向いている方</h3>
        <ul class="service-detail-match-list">
          <li>自社のEC運用を整理・体系化したい</li>
          <li>チームとして一緒に戦略を練りたい</li>
          <li>将来的に自走できる体制を作りたい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 御社のEC事業部の「コアメンバー」として<br>参画させていただきます。
        </p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="service-detail-cta fade-up">
    <h2 class="mb-md">まずは、優先順位の整理から</h2>
    <p>
      今、何がボトルネックになっているのか。<br>
      そこから一緒に紐解きましょう。
    </p>
    <p class="service-detail-cta-note">※ 相談 ＝ 依頼ではありません。</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-main">無料で相談する</a>
  </div>

</main>

<!-- libs (page only) -->
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // icons
    if (window.lucide && typeof window.lucide.createIcons === 'function') {
      window.lucide.createIcons();
    }

    // Chart Before (Dispersed)
    const before = document.getElementById('chartBefore');
    if (before && window.Chart) {
      new Chart(before.getContext('2d'), {
        type: 'pie',
        data: {
          labels: ['広告', 'SEO', 'メルマガ', 'SNS', '商品登録'],
          datasets: [{
            data: [20, 20, 20, 20, 20],
            backgroundColor: ['#e5e7eb', '#d1d5db', '#9ca3af', '#6b7280', '#4b5563'],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false }, tooltip: { enabled: false } },
          animation: { duration: 0 }
        }
      });
    }

    // Chart After (Focused)
    const after = document.getElementById('chartAfter');
    if (after && window.Chart) {
      new Chart(after.getContext('2d'), {
        type: 'pie',
        data: {
          labels: ['商品改善', 'その他'],
          datasets: [{
            data: [80, 20],
            backgroundColor: ['#223a70', '#e5e7eb'],
            borderWidth: 0
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false }, tooltip: { enabled: false } },
          animation: {
            animateScale: true,
            animateRotate: true,
            duration: 2000,
            easing: 'easeOutQuart'
          }
        }
      });
    }

    // fade
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
