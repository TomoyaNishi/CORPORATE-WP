<?php
/**
 * Template Name: about
 * Description: About page template for NOUS (CSS separated, JS inline)
 */
get_header();
?>

<main id="main" class="site-main">

  <!-- FV -->
  <div class="about-hero">
    <div class="about-hero-bg">
      <img
        src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop"
        alt="<?php echo esc_attr__('Office Atmosphere', 'nous'); ?>"
        loading="eager"
        decoding="async"
      >
    </div>

    <div class="about-hero-content fade-up">
      <span class="about-page-subtitle">ABOUT NOUS</span>
      <h1 class="about-main-copy">
        ちゃんと考えて<br>ちゃんと断る
      </h1>
    </div>
  </div>

  <!-- Intro -->
  <section class="section container fade-up">
    <div class="about-message-block">
      <h2 class="about-message-lead">
        それが、<br>NOUSの仕事です。
      </h2>

      <p>
        NOUSは、施策を売る会社ではありません。<br>
        広告、HP、SEO、映像、EC。<br>
        選択肢が多い今の時代だからこそ、<br>
        <span class="text-accent about-underline-strong">「やらない判断」</span>が必要だと考えています。
      </p>

      <p class="about-mt-lg">
        売上が伸びない理由は、努力が足りないからではありません。<br>
        ボタンの掛け違いのように、<br>
        <strong>「順番が合っていないだけ」</strong>のことがほとんどです。
      </p>
    </div>
  </section>

  <!-- Why -->
  <section class="section about-why">
    <div class="container fade-up">

      <div class="text-center">
        <span class="text-gold font-sans about-why-kicker">WHY WE START WITH "WHY"</span>
        <h2 class="mb-md">なぜ「相談」から始めるのか</h2>
        <p>これまで多くの中小企業の相談を受けてきました。<br>その中で最も多く感じたのは、次のような状況です。</p>
      </div>

      <div class="about-comparison-graphic">

        <div class="about-graphic-box about-graphic-box-bad">
          <div class="about-graphic-circle">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
              <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
            </svg>
          </div>
          <h4>一般的な状況</h4>
          <p class="about-graphic-note">
            手段が目的化し、<br>施策だけが増え続ける
          </p>
        </div>

        <div class="about-arrow-right" aria-hidden="true">→</div>

        <div class="about-graphic-box about-graphic-box-good">
          <div class="about-graphic-circle">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <line x1="3" y1="9" x2="21" y2="9"/>
              <line x1="9" y1="21" x2="9" y2="9"/>
            </svg>
          </div>
          <h4>NOUSのアプローチ</h4>
          <p class="about-graphic-note about-graphic-note-good">
            現状を整理し、<br>やる・やらないを仕分ける
          </p>
        </div>

      </div>

      <div class="about-message-block">
        <p>
          この状態で新しい広告やHPを作っても、焼け石に水です。<br>
          だからNOUSは、いきなり提案しません。<br>
          まず、事業・数字・現状を一緒に整理します。
        </p>

        <p class="about-mt-lg">そのうえで、</p>

        <div class="about-bullets">
          ・ 今やるべきこと<br>
          ・ やらなくていいこと<br>
          ・ 今は待つ判断
        </div>

        <p>これらを、正直にお伝えします。</p>
      </div>

    </div>
  </section>

  <!-- Criteria -->
  <section class="section container fade-up">
    <div class="text-center mb-lg">
      <span class="text-gold font-sans about-criteria-kicker">CRITERIA</span>
      <h2 class="mb-md">NOUSの判断基準</h2>
      <p>私たちが提案をするかどうかを決める基準は、<br>非常にシンプルです。</p>
    </div>

    <div class="about-venn-container" aria-label="NOUSの判断基準 ベン図">
      <div class="about-venn-circle about-venn-1">今やる意味</div>
      <div class="about-venn-circle about-venn-2">現実的な成果</div>
      <div class="about-venn-circle about-venn-3">状況の理解</div>
      <div class="about-venn-center">GO</div>
    </div>

    <div class="text-center about-criteria-note">
      <p>
        <strong>「今やる意味があるか」「成果が現実的か」「状況を共有できているか」</strong><br>
        この3つが重なる部分でのみ、施策をご提案します。<br>
        どれか一つでも欠けている場合、勇気を持って<strong>「やらない提案」</strong>をします。
      </p>
    </div>
  </section>

  <!-- Stance -->
  <section class="section about-stance">
    <div class="container fade-up">
      <div class="text-center mb-lg">
        <h2 class="mb-md">「全部できます」とは<br>言いません。</h2>

        <div class="about-message-block">
          <p>
            NOUSには、できることがあります。<br>
            でも、<strong>やらない方がいいことも、同じくらいあります。</strong>
          </p>
          <p>
            何でも屋として御用聞きになるのではなく、<br>
            取捨選択を一緒に行うことこそが、<br>
            <strong>中小企業の「参謀」としての役割</strong>だと考えています。
          </p>
        </div>
      </div>

      <ul class="about-promise-list fade-up">
        <li>無理な営業はしません</li>
        <li>分からないことは、正直に分からないと言います</li>
        <li>長く付き合える形だけを提案します</li>
      </ul>
    </div>
  </section>

  <!-- CTA -->
  <?php get_template_part('components/cta-consult'); ?>


</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const scope = document.querySelector('#main');
    if (!scope) return;

    const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    scope.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
  });
</script>

<?php get_footer(); ?>
