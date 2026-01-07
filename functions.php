<?php
if (!defined('ABSPATH')) exit;

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script'
  ]);

  register_nav_menus([
    'global' => 'グローバルナビゲーション'
  ]);
});

/**
 * Enqueue styles (lightweight)
 */
add_action('wp_enqueue_scripts', function () {

  // 共通CSS
  $main_rel  = '/assets/css/main.css';
  $main_path = get_theme_file_path($main_rel);

  wp_enqueue_style(
    'nous-main',
    get_theme_file_uri($main_rel),
    [],
    file_exists($main_path) ? filemtime($main_path) : null
  );

  // TOP（フロントページ）だけ home.css
  if (is_front_page()) {
    $home_rel  = '/assets/css/pages/home.css';
    $home_path = get_theme_file_path($home_rel);

    wp_enqueue_style(
      'nous-home',
      get_theme_file_uri($home_rel),
      ['nous-main'],
      file_exists($home_path) ? filemtime($home_path) : null
    );
  }

  // About（テンプレ）だけ about.css
  if (is_page_template('page-about.php')) {
    $about_rel  = '/assets/css/pages/about.css';
    $about_path = get_theme_file_path($about_rel);

    wp_enqueue_style(
      'nous-about',
      get_theme_file_uri($about_rel),
      ['nous-main'],
      file_exists($about_path) ? filemtime($about_path) : null
    );
  }

  // Service service.css
  if (is_page_template('page-service.php')) {
    $service_rel  = '/assets/css/pages/service.css';
    $service_path = get_theme_file_path($service_rel);

    wp_enqueue_style(
      'nous-service',
      get_theme_file_uri($service_rel),
      ['nous-main'],
      file_exists($service_path) ? filemtime($service_path) : null
    );
  }

  /**
   * Service detail pages
   * - 共通: service-detail.css
   * - 個別: service-detail-xxx.css をテンプレ別に追加
   */
  $is_detail = (
    is_page_template('page-ads.php') ||
    is_page_template('page-hp.php') ||
    is_page_template('page-seo.php') ||
    is_page_template('page-video.php') ||
    is_page_template('page-ec.php')
  );

  if ($is_detail) {
    // 共通（必須）
    $detail_rel  = '/assets/css/pages/service-detail.css';
    $detail_path = get_theme_file_path($detail_rel);

    wp_enqueue_style(
      'nous-service-detail',
      get_theme_file_uri($detail_rel),
      ['nous-main'],
      file_exists($detail_path) ? filemtime($detail_path) : null
    );

    // 個別（必要なページだけ読み込む）
    $page_specific_map = [
      'page-hp.php'    => 'service-detail-hp.css',
      'page-seo.php'   => 'service-detail-seo.css',
      'page-video.php' => 'service-detail-video.css',
      'page-ec.php'    => 'service-detail-ec.css',
      // 'page-ads.php' => 'service-detail-ads.css', // もし作るならここを有効化
    ];

    foreach ($page_specific_map as $tpl => $css_file) {
      if (is_page_template($tpl)) {
        $rel  = '/assets/css/pages/' . $css_file;
        $path = get_theme_file_path($rel);

        // ハンドル名を一意に（nous-service-detail-hp 等）
        $handle_suffix = str_replace(['service-detail-', '.css'], '', $css_file);

        wp_enqueue_style(
          'nous-service-detail-' . $handle_suffix,
          get_theme_file_uri($rel),
          ['nous-service-detail'], // 共通の後に適用されるよう依存関係を指定
          file_exists($path) ? filemtime($path) : null
        );
      }
    }
  }

}, 20);

/**
 * JSON-LD helper
 */
function nous_json_ld(array $data) {
  echo '<script type="application/ld+json">' .
    wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) .
    '</script>';
}
