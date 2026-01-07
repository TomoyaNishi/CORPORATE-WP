<?php
/**
 * Template Name: service
 * Description: Services page template for NOUS (CSS separated, JS inline)
 */
get_header();
?>

<main id="main" class="site-main">

  <!-- Page Visual -->
  <div class="service-visual fade-up">
    <div class="service-visual-bg">
      <img
        src="https://images.unsplash.com/photo-1528360983277-13d9b152c6d1?q=80&w=2070&auto=format&fit=crop"
        alt="<?php echo esc_attr__('Japanese Garden Texture', 'nous'); ?>"
        loading="eager"
        decoding="async"
      >
    </div>

    <div class="service-visual-content">
      <p class="service-page-subtitle">OUR SERVICES</p>
      <h1 class="service-page-title">提供サービス</h1>
      <p class="service-visual-lead font-sans">
        手段の提供ではなく、<br>事業成長の「核心」を突く。
      </p>
    </div>
  </div>

  <!-- Concept -->
  <section class="section container">
    <div class="service-concept fade-up">
      <p class="service-concept-text">
        NOUSは、サービスを売るための会社ではありません。<br>
        何をやるべきか分からない状態から、事業と状況を整理し、<br>
        <span class="marker">「今やる意味があること」だけ</span>を提案します。<br><br>
        私たちの仕事は、クライアント様の事業に<br>
        一本の太い「筋」を通すことです。<br>
        その結果として、下記のような具体的支援を行っています。
      </p>
    </div>
  </section>

  <!-- Services -->
  <section class="section container">
    <div class="service-list">

      <!-- 1. Ads -->
      <article class="service-block fade-up">
        <div class="service-info">
          <span class="service-num">01. ADS</span>
          <h2 class="service-name">広告運用</h2>
          <p class="service-lead">とりあえず回すをやめ、<br>実施の是非を含めて設計します。</p>
          <p class="service-detail">
            「広告を出せば売れる」という時代は終わりました。CPA（獲得単価）を下げることだけを目的とせず、LTV（顧客生涯価値）や限界利益率に基づいた、事業全体で利益が出る構造を設計します。「今は広告を打つべきではない」という判断も含め、正直にご提案します。
          </p>
          <ul class="service-points">
            <li>Google / Yahoo / Meta / LINE 各種媒体対応</li>
            <li>撤退ラインの明確化と予算管理</li>
            <li>クリエイティブの高速PDCA</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/service/ads/')); ?>" class="service-link-btn">詳細を見る</a>
        </div>

        <div class="service-media">
          <img
            src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=800"
            alt="<?php echo esc_attr__('Ads Strategy', 'nous'); ?>"
            loading="lazy"
            decoding="async"
          >
        </div>
      </article>

      <!-- 2. Web -->
      <article class="service-block fade-up">
        <div class="service-info">
          <span class="service-num">02. HP PRODUCTION</span>
          <h2 class="service-name">HP制作</h2>
          <p class="service-lead">「誰がどう動くか」の<br>動線設計から入るサイト制作。</p>
          <p class="service-detail">
            綺麗なだけのサイトは作りません。採用、集客、ブランディング、目的によって「正解」は異なります。ターゲットユーザーの心理変容を設計し、問い合わせや購入といったビジネスゴールへ確実に導くためのUI/UXを実装します。
          </p>
          <ul class="service-points">
            <li>コーポレートサイト / LP / 採用サイト</li>
            <li>更新性を考慮したCMS構築 (WordPress等)</li>
            <li>CVR（コンバージョン率）改善のための導線設計</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/service/hp/')); ?>" class="service-link-btn">詳細を見る</a>
        </div>

        <div class="service-media">
          <img
            src="https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&q=80&w=800"
            alt="<?php echo esc_attr__('Web Design', 'nous'); ?>"
            loading="lazy"
            decoding="async"
          >
        </div>
      </article>

      <!-- 3. SEO -->
      <article class="service-block fade-up">
        <div class="service-info">
          <span class="service-num">03. SEO</span>
          <h2 class="service-name">SEO対策</h2>
          <p class="service-lead">小手先の技術ではなく、<br>資産となるコンテンツを。</p>
          <p class="service-detail">
            検索エンジンのアルゴリズムハックではなく、ユーザーの検索意図（インサイト）に徹底的に向き合います。読んだ人が納得し、信頼を寄せるような質の高い記事コンテンツを制作することで、長期的に流入を生み続ける「資産」を構築します。
          </p>
          <ul class="service-points">
            <li>キーワード選定・競合分析</li>
            <li>専門家監修による高品質記事制作</li>
            <li>内部対策・テクニカルSEO</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/service/seo/')); ?>" class="service-link-btn">詳細を見る</a>
        </div>

        <div class="service-media">
          <img
            src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?auto=format&fit=crop&q=80&w=800"
            alt="<?php echo esc_attr__('SEO Content', 'nous'); ?>"
            loading="lazy"
            decoding="async"
          >
        </div>
      </article>

      <!-- 4. Video -->
      <article class="service-block fade-up">
        <div class="service-info">
          <span class="service-num">04. VIDEO</span>
          <h2 class="service-name">映像制作</h2>
          <p class="service-lead">ブランドの空気感を伝える、<br>質感を重視した映像。</p>
          <p class="service-detail">
            言葉では伝えきれないブランドの「温度」や「想い」を、映像という手段で表現します。説明的な動画ではなく、見た人の感性に訴えかけるシネマティックな表現を得意としています。Webサイトの背景動画から、プロモーション用CMまで対応可能です。
          </p>
          <ul class="service-points">
            <li>ブランドムービー / コンセプト映像</li>
            <li>インタビュー / 採用動画</li>
            <li>ドローン空撮 / シネマティック編集</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/service/video/')); ?>" class="service-link-btn">詳細を見る</a>
        </div>

        <div class="service-media">
          <img
            src="https://images.unsplash.com/photo-1535016120720-40c6874c3b1c?auto=format&fit=crop&q=80&w=800"
            alt="<?php echo esc_attr__('Video Production', 'nous'); ?>"
            loading="lazy"
            decoding="async"
          >
        </div>
      </article>

      <!-- 5. EC -->
      <article class="service-block fade-up">
        <div class="service-info">
          <span class="service-num">05. EC MANAGEMENT</span>
          <h2 class="service-name">ECモール運用</h2>
          <p class="service-lead">施策を減らし、<br>売上に直結する業務へリソースを集中。</p>
          <p class="service-detail">
            Amazon、楽天市場、Yahoo!ショッピングなどのモール運用は、やるべきことが無限にあります。私たちは、貴社のリソースを圧迫している作業を整理し、自動化や効率化を推進。さらに、売上インパクトの大きい「商品開発」や「ページ改善」に注力できる体制を作ります。
          </p>
          <ul class="service-points">
            <li>モール内SEO / 広告運用代行</li>
            <li>商品ページ（LP）制作</li>
            <li>在庫管理・物流オペレーション改善提案</li>
          </ul>
          <a href="<?php echo esc_url(home_url('/service/ec/')); ?>" class="service-link-btn">詳細を見る</a>
        </div>

        <div class="service-media">
          <img
            src="https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?auto=format&fit=crop&q=80&w=800"
            alt="<?php echo esc_attr__('EC Operation', 'nous'); ?>"
            loading="lazy"
            decoding="async"
          >
        </div>
      </article>

    </div>
  </section>

  <!-- CTA -->
  <?php get_template_part('components/cta-consult'); ?>

</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
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
