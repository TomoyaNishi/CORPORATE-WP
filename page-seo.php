<?php
/**
 * Template Name: seo
 * Description: Service detail page - SEO Strategy (CSS separated, Chart.js)
 */
get_header();
?>

<main id="main" class="site-main service-detail service-detail--seo">

  <!-- FV -->
  <div class="service-detail-hero fade-up">
    <div class="service-detail-hero-bg">
      <img
        src="https://images.unsplash.com/photo-1598367772323-3a4b704984f1?q=80&w=2070&auto=format&fit=crop"
        alt="<?php echo esc_attr__('Stone Wall Structure', 'nous'); ?>"
        loading="eager"
        decoding="async"
      >
    </div>

    <div class="service-detail-hero-content">
      <span class="service-detail-subtitle">SEO STRATEGY</span>
      <h1 class="service-detail-title">SEOについて</h1>
      <p class="service-detail-hero-lead font-sans">
        すぐに結果は出ない。<br>だからこそ、資産になる。
      </p>
    </div>
  </div>

  <!-- Intro -->
  <section class="section container fade-up">
    <p class="service-detail-intro-lead">
      SEOは、すぐに結果が出る施策ではありません。<br>
      小手先のテクニックで一時的に順位を上げても、<br>
      <span class="service-detail-text-gold service-detail-underline">
        すぐにアルゴリズムの変化で崩れ去ります。
      </span>
    </p>

    <p class="service-detail-intro-desc">
      NOUSが提案するのは、一過性の「攻略」ではなく、<br>
      長く愛され続ける「資産」としてのコンテンツづくりです。
    </p>
  </section>

  <!-- Concerns -->
  <section class="section service-detail-soft-bg">
    <div class="container fade-up">
      <div class="service-detail-center">
        <span class="service-detail-kicker text-gold font-sans">CONCERNS</span>
        <h2 class="mb-md">よくあるご相談</h2>
      </div>

      <div class="service-detail-concerns-grid service-detail-concerns-grid--seo">
        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="help-circle"></i></div>
            <span class="service-detail-concern-label">CASE 01</span>
          </div>
          <p class="service-detail-concern-text">「SEO対策をしましょう」<br>と言われるが、具体的に<br>何からすべきか分からない。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="search-x"></i></div>
            <span class="service-detail-concern-label">CASE 02</span>
          </div>
          <p class="service-detail-concern-text">ブログを更新しているが、<br>検索順位が上がらず<br>効果を感じられない。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="trending-down"></i></div>
            <span class="service-detail-concern-label">CASE 03</span>
          </div>
          <p class="service-detail-concern-text">以前業者に頼んだが、<br>ブラックボックスで<br>何をしているか不明だった。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Philosophy -->
  <section class="section container fade-up">
    <div class="service-detail-center">
      <span class="service-detail-kicker text-gold font-sans">PHILOSOPHY</span>
      <h2 class="mb-md">NOUSの考え方</h2>
      <p>SEOは「やる」より「続けられるか」が重要です。<br>短期的な成果を約束することはしません。</p>
    </div>

    <div class="service-detail-philosophy-wrapper service-detail-center service-detail-philosophy-wrapper--seo">
      <h3>資産の積み上げイメージ</h3>
      <p class="font-sans service-detail-muted">
        広告は一時的なブーストですが、SEOは複利で効いてきます。
      </p>

      <div class="service-detail-chart-container">
        <canvas id="seoChart"></canvas>
      </div>

      <div class="service-detail-philosophy-text-block">
        <p>
          広告費を止めればアクセスがゼロになる広告とは異なり、<br>
          正しいSEOで構築したコンテンツは、<br>
          24時間365日働き続ける<strong>「優秀な営業マン」</strong>になります。<br><br>
          時間はかかりますが、損益分岐点を超えた先のリターンは<br>
          計り知れません。
        </p>
      </div>
    </div>
  </section>

  <!-- Workflow -->
  <section class="section service-detail-white-bg">
    <div class="container fade-up">
      <div class="service-detail-center mb-lg">
        <span class="service-detail-kicker text-gold font-sans">WORKFLOW</span>
        <h2 class="mb-md">SEO対策ワークフロー</h2>
        <p>診断から実装、継続的な改善まで。<br>一気通貫でサポートします。</p>
      </div>

      <div class="service-detail-workflow-wrapper">

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">01</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">現状診断・キーワード戦略 <span class="service-detail-step-en">Audit & Strategy</span></h3>
              <i data-lucide="microscope" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">プロジェクト開始時、または毎月の初動で行う、戦略の核となるフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>サイト内部診断（SEOオーディット）</h4>
                <ul>
                  <li>現在のサイト構造、エラー状況のチェック</li>
                  <li>Search Console, GA4データ分析</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>対策キーワード選定</h4>
                <ul>
                  <li>競合サイトの流入キーワード調査</li>
                  <li>キーワードマップの作成</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">02</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">内部施策・テクニカルSEO <span class="service-detail-step-en">Internal Optimization</span></h3>
              <i data-lucide="code-2" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">検索エンジンがサイトを正しく評価・巡回できるように土台を整えるフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>タグ・構造の最適化</h4>
                <ul>
                  <li>タイトル、メタディスクリプションの最適化</li>
                  <li>見出しタグ（h1-h3）の階層構造修正</li>
                  <li>内部リンク構造の設計</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>表示速度・ユーザビリティ改善</h4>
                <ul>
                  <li>Core Web Vitals（表示速度）の改善</li>
                  <li>モバイルフレンドリー対応確認</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">03</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">コンテンツSEO・記事制作 <span class="service-detail-step-en">Content Creation</span></h3>
              <i data-lucide="pen-tool" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">ユーザーの検索意図（インサイト）を満たす良質なコンテンツを増やすフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>構成案作成・ライティング</h4>
                <ul>
                  <li>検索意図の分析と構成案作成</li>
                  <li>E-E-A-Tを意識した原稿執筆</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>リライト・マークアップ</h4>
                <ul>
                  <li>過去記事の情報更新（リライト）</li>
                  <li>構造化データマークアップ</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">04</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">外部要因対策・サイテーション <span class="service-detail-step-en">Authority Building</span></h3>
              <i data-lucide="link" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">サイトの信頼性を高め、ドメインパワーを強化するフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>被リンク対策</h4>
                <ul>
                  <li>被リンク状況の確認・スパム否認</li>
                  <li>SNS拡散、プレスリリース配信</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>サイテーション強化</h4>
                <ul>
                  <li>Googleビジネスプロフィール（MEO）整備</li>
                  <li>NAP情報（名前・住所・電話）の統一</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">05</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">モニタリング・定例報告 <span class="service-detail-step-en">Reporting & PDCA</span></h3>
              <i data-lucide="bar-chart-2" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">行った施策の結果を確認し、次の一手を考える継続フェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>順位計測・レポート作成</h4>
                <ul>
                  <li>指定キーワードの順位変動レポート</li>
                  <li>流入数、CV数の推移報告</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>要因分析と改善提案</h4>
                <ul>
                  <li>順位変動の要因分析</li>
                  <li>次月の施策決定・優先順位入替</li>
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
          <li>来月の売上をすぐに作りたい</li>
          <li>質の低い記事を大量生産したい</li>
          <li>順位保証（成果報酬）をしてほしい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 短期的な成果が必要な場合は、<br>Web広告の運用をおすすめします。
        </p>
      </div>

      <div class="service-detail-match-col service-detail-ok">
        <div class="service-detail-match-badge">RECOMMENDED</div>
        <h3 class="service-detail-match-title service-detail-match-title-ok">NOUSが向いている方</h3>
        <ul class="service-detail-match-list">
          <li>半年〜1年単位で腰を据えて取り組める</li>
          <li>広告費に依存しない集客柱を作りたい</li>
          <li>自社のノウハウを資産として残したい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 共に「資産」を作るパートナーとして<br>伴走させていただきます。
        </p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <?php get_template_part('components/cta-consult'); ?>

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

    // chart
    const canvas = document.getElementById('seoChart');
    if (canvas && window.Chart) {
      const ctx = canvas.getContext('2d');

      const gradientSeo = ctx.createLinearGradient(0, 300, 0, 0);
      gradientSeo.addColorStop(0, 'rgba(34, 58, 112, 0.1)');
      gradientSeo.addColorStop(1, 'rgba(34, 58, 112, 0.5)');

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['開始', '3ヶ月', '6ヶ月', '1年', '1.5年', '2年'],
          datasets: [
            {
              label: 'SEO (資産蓄積)',
              data: [5, 10, 25, 55, 120, 200],
              borderColor: '#223a70',
              backgroundColor: gradientSeo,
              borderWidth: 3,
              fill: true,
              tension: 0.4
            },
            {
              label: '広告 (一時停止した場合)',
              data: [80, 80, 80, 0, 0, 0],
              borderColor: '#c7b370',
              borderWidth: 2,
              borderDash: [5, 5],
              fill: false,
              tension: 0.1
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom',
              labels: { font: { family: "'Noto Sans JP', sans-serif" } }
            },
            tooltip: { mode: 'index', intersect: false }
          },
          scales: {
            y: { display: false, beginAtZero: true },
            x: {
              grid: { display: false },
              ticks: { font: { family: "'Noto Sans JP', sans-serif" } }
            }
          },
          animation: { duration: 2000, easing: 'easeOutQuart' }
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
