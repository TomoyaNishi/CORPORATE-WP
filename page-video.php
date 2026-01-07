<?php
/**
 * Template Name: video
 * Description: Service detail page - Video Production (CSS separated, Chart.js donut)
 */
get_header();
?>

<main id="main" class="site-main service-detail service-detail--video">

  <!-- FV -->
  <div class="service-detail-hero fade-up">
    <a href="<?php echo esc_url(home_url('/service/')); ?>" class="service-detail-back-link">← サービス一覧へ戻る</a>

    <div class="service-detail-hero-bg">
      <img
        src="https://images.unsplash.com/photo-1574375927938-d5a98e8efe85?q=80&w=2069&auto=format&fit=crop"
        alt="<?php echo esc_attr__('Cinematic Studio Light', 'nous'); ?>"
        loading="eager"
        decoding="async"
      >
    </div>

    <div class="service-detail-hero-content">
      <span class="service-detail-subtitle">VIDEO PRODUCTION</span>
      <h1 class="service-detail-title">映像制作について</h1>
      <p class="service-detail-hero-lead font-sans">
        派手さはいらない。<br>伝わるか、否か。
      </p>
    </div>
  </div>

  <!-- Intro -->
  <section class="section container fade-up">
    <p class="service-detail-intro-lead">
      映像は、信頼と理解を早める強力な手段です。<br>
      しかし、目的のない映像は、<br>
      <span class="service-detail-text-gold service-detail-underline">
        ただの自己満足（アート）
      </span>になってしまいます。
    </p>

    <p class="service-detail-intro-desc">
      NOUSは、綺麗な映像を作ることよりも、<br>
      「誰に何を届けるか」の設計に時間を使います。
    </p>
  </section>

  <!-- Concerns -->
  <section class="section service-detail-soft-bg">
    <div class="container fade-up">
      <div class="service-detail-center">
        <span class="service-detail-kicker text-gold font-sans">CONCERNS</span>
        <h2 class="mb-md">よくあるご相談</h2>
      </div>

      <div class="service-detail-concerns-grid service-detail-concerns-grid--video">
        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="video-off"></i></div>
            <span class="service-detail-concern-label">CASE 01</span>
          </div>
          <p class="service-detail-concern-text">動画を作りたいが、<br>具体的に何を撮ればいいか<br>分からない。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="monitor-play"></i></div>
            <span class="service-detail-concern-label">CASE 02</span>
          </div>
          <p class="service-detail-concern-text">広告用なのか、<br>採用や会社紹介用なのか<br>用途に迷っている。</p>
        </div>

        <div class="service-detail-concern-card">
          <div class="service-detail-concern-header">
            <div class="service-detail-concern-icon-wrap"><i data-lucide="layers"></i></div>
            <span class="service-detail-concern-label">CASE 03</span>
          </div>
          <p class="service-detail-concern-text">文章や写真だけでは、<br>自社のサービスの魅力が<br>伝わりきらない。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Philosophy -->
  <section class="section container fade-up">
    <div class="service-detail-center">
      <span class="service-detail-kicker text-gold font-sans">PHILOSOPHY</span>
      <h2 class="mb-md">NOUSの考え方</h2>
      <p>映像は「何を伝えるか」が9割です。<br>派手なエフェクトより、分かりやすい構成を重視します。</p>
    </div>

    <div class="service-detail-philosophy-wrapper service-detail-center service-detail-philosophy-wrapper--video">
      <h3>映像制作における重要度</h3>
      <p class="font-sans service-detail-muted">
        撮影技術よりも、事前の設計で勝負が決まります。
      </p>

      <div class="service-detail-donut">
        <canvas id="videoChart"></canvas>

        <div class="service-detail-donut-center">
          <span class="service-detail-donut-val">90<span class="service-detail-donut-val-unit">%</span></span>
          <span class="service-detail-donut-label">企画・構成</span>
        </div>
      </div>

      <div class="service-detail-philosophy-text-block">
        <p>
          どれだけ美しい映像も、メッセージが曖昧なら<br>
          視聴者の心には残りません。<br><br>
          NOUSは、撮影に入る前の<strong>「言語化」と「構成」</strong>を<br>
          徹底的に作り込みます。<br>
          撮影は、その設計図を形にする作業に過ぎません。
        </p>
      </div>
    </div>
  </section>

  <!-- Workflow -->
  <section class="section service-detail-white-bg">
    <div class="container fade-up">
      <div class="service-detail-center mb-lg">
        <span class="service-detail-kicker text-gold font-sans">WORKFLOW</span>
        <h2 class="mb-md">映像制作ワークフロー</h2>
        <p>企画から撮影、編集、納品まで。<br>一気通貫でサポートします。</p>
      </div>

      <div class="service-detail-workflow-wrapper">

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">01</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">ヒアリング・企画構成 <span class="service-detail-step-en">Pre-Production</span></h3>
              <i data-lucide="clipboard-list" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">動画の目的を整理し、「どのような映像を作るか」の設計図を作るフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>ヒアリングと目的設定</h4>
                <ul>
                  <li>利用用途（Web, SNS, CM等）の確認</li>
                  <li>ターゲットとメッセージの明確化</li>
                  <li>予算・スケジュールのすり合わせ</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>企画・構成案作成</h4>
                <ul>
                  <li>シナリオ（台本）・絵コンテ作成</li>
                  <li>スタッフィング（チーム編成）</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">02</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">撮影準備 <span class="service-detail-step-en">Pre-Production</span></h3>
              <i data-lucide="map-pin" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">撮影当日に向けて、物理的な準備を整えるフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>ロケハン・キャスティング</h4>
                <ul>
                  <li>撮影場所の選定・許可取り</li>
                  <li>役者・ナレーターの手配</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>香盤表・機材準備</h4>
                <ul>
                  <li>当日の分刻みスケジュール作成</li>
                  <li>機材・小道具・衣装の準備</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">03</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">撮影 <span class="service-detail-step-en">Production</span></h3>
              <i data-lucide="video" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">実際に映像素材を収録するフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>セッティング・リハーサル</h4>
                <ul>
                  <li>カメラ・照明・音声の設置テスト</li>
                  <li>出演者への演技指導</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>本番撮影（シューティング）</h4>
                <ul>
                  <li>香盤表に沿った進行</li>
                  <li>モニターチェック・データバックアップ</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">04</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">編集・加工 <span class="service-detail-step-en">Post-Production</span></h3>
              <i data-lucide="scissors" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">撮影した素材をつなぎ合わせ、映像作品として仕上げるフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>仮編集（オフライン）</h4>
                <ul>
                  <li>カット割り・テロップ仮配置</li>
                  <li>全体の流れ確認（初校提出）</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>本編集（オンライン）</h4>
                <ul>
                  <li>カラーグレーディング（色味調整）</li>
                  <li>モーショングラフィックス・合成</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">05</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">整音・MA <span class="service-detail-step-en">Sound Design</span></h3>
              <i data-lucide="music" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">映像に「音」を加え、クオリティを最終決定する重要な技術フェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>BGM・効果音選定</h4>
                <ul>
                  <li>著作権クリア済み音楽の選定・挿入</li>
                  <li>効果音（SE）による演出</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>ナレーション・ミックス</h4>
                <ul>
                  <li>ナレーター収録</li>
                  <li>音量バランス調整・ノイズ除去</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-detail-step-row">
          <div class="service-detail-step-marker"><div class="service-detail-step-circle">06</div></div>
          <div class="service-detail-step-content-box">
            <div class="service-detail-step-header">
              <h3 class="service-detail-step-title">試写・納品 <span class="service-detail-step-en">Delivery</span></h3>
              <i data-lucide="check-circle" class="service-detail-step-icon"></i>
            </div>
            <p class="service-detail-step-desc">最終確認を経て、指定の形式で納品するフェーズです。</p>
            <div class="service-detail-step-details">
              <div class="service-detail-detail-block">
                <h4>最終試写（プレビュー）</h4>
                <ul>
                  <li>クライアント最終チェック</li>
                  <li>細部の微調整</li>
                </ul>
              </div>
              <div class="service-detail-detail-block">
                <h4>エンコード・納品</h4>
                <ul>
                  <li>用途に合わせた形式出力（MP4等）</li>
                  <li>データ納品</li>
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
          <li>とにかく派手でカッコいい動画を作りたい</li>
          <li>バズる動画を作ってほしい</li>
          <li>構成は丸投げで、撮影だけしてほしい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 演出重視の映像プロダクション様の方が<br>ご満足いただける可能性があります。
        </p>
      </div>

      <div class="service-detail-match-col service-detail-ok">
        <div class="service-detail-match-badge">RECOMMENDED</div>
        <h3 class="service-detail-match-title service-detail-match-title-ok">NOUSが向いている方</h3>
        <ul class="service-detail-match-list">
          <li>複雑なサービスを分かりやすく伝えたい</li>
          <li>会社の空気感や想いを表現したい</li>
          <li>営業ツールとして機能する動画が欲しい</li>
        </ul>
        <p class="service-detail-match-note">
          ※ 「伝わる」ことにこだわった映像を<br>一緒に作り上げます。
        </p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="service-detail-cta fade-up">
    <h2 class="mb-md">まずは、作る目的の整理から</h2>
    <p>
      なぜ映像が必要なのか。<br>
      そこから一緒に考えましょう。
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

    // donut chart
    const canvas = document.getElementById('videoChart');
    if (canvas && window.Chart) {
      const ctx = canvas.getContext('2d');

      new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['企画・構成', '撮影・編集技術'],
          datasets: [{
            data: [90, 10],
            backgroundColor: [
              'rgba(34, 58, 112, 1)',
              'rgba(199, 179, 112, 0.5)'
            ],
            borderWidth: 0,
            hoverOffset: 4
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '75%',
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                font: { family: "'Noto Sans JP', sans-serif" },
                padding: 20
              }
            },
            tooltip: { enabled: false }
          },
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
