<header class="site-header" id="header">
  <!-- Logo -->
  <a href="<?php echo home_url('/'); ?>" class="header-logo">NOUS</a>

  <!-- PC Navigation -->
  <nav class="pc-nav" aria-label="グローバルナビ">
    <a href="<?php echo home_url('/service/'); ?>" class="nav-link">サービス</a>
    <a href="<?php echo home_url('/works/'); ?>" class="nav-link">実績</a>
    <a href="<?php echo home_url('/about/'); ?>" class="nav-link">NOUSについて</a>
    <a href="<?php echo home_url('/contact/'); ?>" class="nav-cta">無料相談</a>
  </nav>

  <!-- Hamburger Toggle -->
  <div class="menu-toggle" id="menuToggle" aria-label="メニュー" role="button" tabindex="0">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <!-- SP Navigation Overlay -->
  <nav class="sp-nav" id="spNav" aria-label="スマホナビ">
    <ul class="sp-nav-list">
      <li class="sp-nav-item">
        <a href="<?php echo home_url('/service/'); ?>" class="sp-nav-link">サービス</a>
      </li>
      <li class="sp-nav-item">
        <a href="<?php echo home_url('/works/'); ?>" class="sp-nav-link">実績</a>
      </li>
      <li class="sp-nav-item">
        <a href="<?php echo home_url('/about/'); ?>" class="sp-nav-link">NOUSについて</a>
      </li>
      <li class="sp-nav-item">
        <a href="<?php echo home_url('/contact/'); ?>" class="sp-nav-cta">無料相談</a>
      </li>
    </ul>
  </nav>
</header>
