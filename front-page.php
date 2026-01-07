<?php
get_header();
?>

<main>

  <!-- 1. Hero Section -->
  <header class="home-hero">
    <div class="home-hero__visual">
      <img
        src="https://images.unsplash.com/photo-1562632725-c1731570f5da?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Kyoto Texture"
        loading="eager"
      >
    </div>

    <div class="home-hero__content fade-up">
      <div class="home-hero__text-wrap">
        <h1 class="home-hero__title tategaki">
          売りたい施策は<br>ありません。<br><br>
          今、為すべきを<br>共に決める。
        </h1>

        <div class="home-hero__sub tategaki">
          広告、HP、映像。<br>
          選択肢に惑わされず、<br>
          本質的な一手を。<br>
        </div>
      </div>
    </div>
  </header>

  <!-- 2. Problem Section -->
  <section class="section container">
    <div class="home-problem fade-up">
      <span class="home-kicker">01 — 現状</span>
      <h2 class="mb-md">立ち止まって<br>いませんか。</h2>

      <p class="home-lead">
        広告、WEBサイト、SNS運用。<br>
        <span class="marker">手段は増え続け、何から手をつければいいか分からない。</span><br>
        「とりあえず」で動いている施策に、確かな手応えはありますか？
      </p>

      <ul class="home-problem__list">
        <li>・ 広告費だけが減り、<strong class="text-ink">成果が見えない</strong></li>
        <li>・ 制作会社と代理店で<strong class="text-ink">話が噛み合わない</strong></li>
        <li>・ 相談できる<strong class="text-ink">「参謀」がいない</strong></li>
      </ul>

      <!-- Before/After Diagram -->
      <div class="home-ba">
        <div class="home-ba__card">
          <h3 class="home-ba__title">BEFORE: 混沌</h3>

          <div class="home-chaos">
            <div class="home-chaos__line"></div>
            <div class="home-chaos__line"></div>
            <div class="home-chaos__line"></div>
            <div class="home-chaos__line"></div>
            <div class="home-chaos__line"></div>
            <div class="home-chaos__line"></div>
            <div class="home-chaos__msg">何からやる？</div>
          </div>

          <p class="home-ba__note">施策が絡まり合い<br>核心が見えない</p>
        </div>

        <div class="home-ba__arrow">→</div>

        <div class="home-ba__card">
          <h3 class="home-ba__title text-accent">AFTER: 調和</h3>

          <div class="home-harmony">
            <div class="home-harmony__orbit">
              <div class="home-harmony__satellite home-harmony__satellite--s1"></div>
              <div class="home-harmony__satellite home-harmony__satellite--s2"></div>
              <div class="home-harmony__satellite home-harmony__satellite--s3"></div>
              <div class="home-harmony__satellite home-harmony__satellite--s4"></div>
            </div>
            <div class="home-harmony__core"></div>
          </div>

          <p class="home-ba__note home-ba__note--strong">軸を中心に<br>全てが連携する</p>
        </div>
      </div>

      <p class="text-lg">
        複雑な状況を整理し、<br>
        <span class="text-accent">一本の筋を通す。</span>
      </p>
    </div>
  </section>

  <!-- 3. Achievements -->
  <section class="section container">
    <div class="text-center fade-up">
      <span class="home-kicker">02 — 実績</span>
      <h2 class="mb-lg">思考のあとに、<br>結果はついてくる。</h2>
    </div>

    <div class="home-case-grid fade-up">
      <div class="home-case-card">
        <div class="home-case-card__head">
          <h3>飲食業</h3>
          <span class="home-case-card__tag">広告運用</span>
        </div>

        <p class="home-case-card__desc">初月は広告停止。利益導線を整理し再開。</p>

        <div class="home-chart">
          <canvas id="chartRestaurant"></canvas>
        </div>

        <p class="home-case-card__foot">
          問い合わせ数 <span class="text-accent home-case-card__big">2.1倍</span>
        </p>
      </div>

      <div class="home-case-card">
        <div class="home-case-card__head">
          <h3>サービス業</h3>
          <span class="home-case-card__tag">HP改善</span>
        </div>

        <p class="home-case-card__desc">リニューアルせず、広告設計のみを修正。</p>

        <div class="home-gauge">
          <span class="home-gauge__val">1.8</span>
          <span class="home-gauge__label">倍</span>
        </div>

        <p class="home-gauge__sub">(CVR改善率)</p>

        <div class="home-case-card__bottom">
          <p>制作費 <span class="text-accent">ゼロ</span></p>
        </div>
      </div>

      <div class="home-case-card">
        <div class="home-case-card__head">
          <h3>EC事業</h3>
          <span class="home-case-card__tag">運用代行</span>
        </div>

        <p class="home-case-card__desc">施策を1/3に削減し、売上直結業務へ集中。</p>

        <div class="home-chart">
          <canvas id="chartEC"></canvas>
        </div>

        <p class="home-case-card__foot">
          売上 <span class="text-accent home-case-card__big">1.4倍</span> に成長
        </p>
      </div>
    </div>
  </section>

  <!-- 4. Service Section -->
  <section class="section home-service">
    <div class="container">
      <div class="text-center fade-up">
        <span class="home-kicker">03 — 解決</span>
        <h2 class="mb-lg">提供サービス</h2>
      </div>

      <div class="home-service-grid fade-up">
        <a class="home-service-card" href="<?php echo esc_url(home_url('/service/ads/')); ?>">
          <div class="home-service-card__img">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=600" alt="Ads" loading="lazy">
          </div>
          <div class="home-service-card__body">
            <h3 class="home-service-card__title">広告運用</h3>
            <p class="home-service-card__desc">とりあえず回すをやめ、<span class="text-accent">実施の是非</span>を含めて設計します。</p>
          </div>
        </a>

        <a class="home-service-card" href="<?php echo esc_url(home_url('/service/hp/')); ?>">
          <div class="home-service-card__img">
            <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&q=80&w=600" alt="Web" loading="lazy">
          </div>
          <div class="home-service-card__body">
            <h3 class="home-service-card__title">HP制作</h3>
            <p class="home-service-card__desc"><span class="text-accent">「誰がどう動くか」</span>の動線設計から入るサイト制作。</p>
          </div>
        </a>

        <a class="home-service-card" href="<?php echo esc_url(home_url('/service/seo/')); ?>">
          <div class="home-service-card__img">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=600" alt="SEO" loading="lazy">
          </div>
          <div class="home-service-card__body">
            <h3 class="home-service-card__title">SEO対策</h3>
            <p class="home-service-card__desc">小手先の技術ではなく、<span class="text-accent">資産となる</span>コンテンツを。</p>
          </div>
        </a>

        <a class="home-service-card" href="<?php echo esc_url(home_url('/service/video/')); ?>">
          <div class="home-service-card__img">
            <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&q=80&w=600" alt="Video" loading="lazy">
          </div>
          <div class="home-service-card__body">
            <h3 class="home-service-card__title">映像制作</h3>
            <p class="home-service-card__desc">ブランドの<span class="text-accent">空気感</span>を伝える、質感を重視した映像。</p>
          </div>
        </a>

        <a class="home-service-card" href="<?php echo esc_url(home_url('/service/ec/')); ?>">
          <div class="home-service-card__img">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?auto=format&fit=crop&q=80&w=600" alt="EC" loading="lazy">
          </div>
          <div class="home-service-card__body">
            <h3 class="home-service-card__title">ECモール運用</h3>
            <p class="home-service-card__desc">施策を減らし、<span class="text-accent">売上に直結する業務</span>へリソースを集中。</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- 5. Members Section -->
  <section class="section container">
    <div class="text-center fade-up">
      <span class="home-kicker">04 — メンバー</span>
      <h2 class="mb-lg">私たちについて</h2>
    </div>

    <div class="home-members fade-up">
      <div class="home-member">
        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=600" alt="Member 1" class="home-member__img" loading="lazy">
        <h3 class="home-member__name">佐藤 健太郎</h3>
        <span class="home-member__role">Strategist / CEO</span>
        <p class="home-member__bio">大手広告代理店を経てNOUSを設立。数々のブランド再生プロジェクトを牽引。「捨てる勇気」を信念に、本質的なマーケティングを提案する。</p>
      </div>

      <div class="home-member">
        <img src="https://images.unsplash.com/photo-1573496359-7013ac53b90b?auto=format&fit=crop&q=80&w=600" alt="Member 2" class="home-member__img" loading="lazy">
        <h3 class="home-member__name">田中 美咲</h3>
        <span class="home-member__role">Art Director</span>
        <p class="home-member__bio">美術大学卒業後、デザイン事務所にてCI/VI開発に従事。日本の伝統美と現代的な機能美を融合させたデザインを得意とする。</p>
      </div>

      <div class="home-member">
        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&q=80&w=600" alt="Member 3" class="home-member__img" loading="lazy">
        <h3 class="home-member__name">鈴木 大輔</h3>
        <span class="home-member__role">Marketer / Analyst</span>
        <p class="home-member__bio">データサイエンス領域出身。感性に頼らない論理的な市場分析で、クライアントの隠れた課題を浮き彫りにする。</p>
      </div>
    </div>
  </section>

  <!-- 6. CTA -->
  <section class="section container">
    <div class="home-cta fade-up">
      <div class="home-cta__bg"></div>

      <div class="home-cta__content">
        <h2 class="mb-md">まずは、整理から。</h2>
        <p class="text-lg">
          何をやるべきか分からない。<br>
          それを一人で抱え込む必要はありません。<br>
          状況を伺った上で、<span class="text-accent">正直にお伝えします。</span>
        </p>

        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-main">無料で相談する</a>

        <p class="home-cta__note">※ ご相談は、ご依頼ではありません。</p>
      </div>
    </div>
  </section>

</main>

<footer class="home-footer">
  <p>&copy; <?php echo esc_html(date('Y')); ?> NOUS Inc. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    const scope = document.querySelector('main');
    if (!scope) return;

    const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');

          if (entry.target.querySelector('#chartRestaurant') && !window.chartRestaurantCreated) {
            createRestaurantChart();
            window.chartRestaurantCreated = true;
          }
          if (entry.target.querySelector('#chartEC') && !window.chartECCreated) {
            createECChart();
            window.chartECCreated = true;
          }

          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    scope.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
  });

  function createRestaurantChart() {
    const canvas = document.getElementById('chartRestaurant');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Before', 'After'],
        datasets: [{
          label: '問い合わせ数',
          data: [45, 96],
          backgroundColor: [
            'rgba(200, 200, 200, 0.5)',
            'rgba(34, 58, 112, 0.8)'
          ],
          borderColor: [
            'rgba(200, 200, 200, 1)',
            'rgba(34, 58, 112, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          y: { beginAtZero: true, grid: { display: false } },
          x: { grid: { display: false } }
        }
      }
    });
  }

  function createECChart() {
    const canvas = document.getElementById('chartEC');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['1月', '2月', '3月', '4月', '5月', '6月'],
        datasets: [{
          label: '売上推移',
          data: [100, 105, 115, 125, 132, 140],
          borderColor: '#b64826',
          backgroundColor: 'rgba(182, 72, 38, 0.1)',
          borderWidth: 2,
          tension: 0.3,
          pointBackgroundColor: '#fff',
          pointBorderColor: '#b64826',
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          y: { display: false, min: 90 },
          x: { grid: { display: false } }
        }
      }
    });
  }
</script>

<?php get_footer(); ?>
