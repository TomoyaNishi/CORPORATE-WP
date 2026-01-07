<?php
/**
 * Common CTA (Consult)
 *
 * Usage:
 * get_template_part('components/cta-consult');
 *
 * Optional args:
 * get_template_part('components/cta-consult', null, [
 *   'title' => 'まずは、整理から。',
 *   'text'  => "何をやるべきか分からない。<br>...",
 *   'note'  => '※ ご相談は、ご依頼ではありません。',
 *   'btn'   => '無料で相談する',
 *   'class' => 'section container', // wrapper class
 * ]);
 */

$title = $args['title'] ?? 'まずは、整理から。';
$text  = $args['text']  ?? '何をやるべきか分からない。<br>それを一人で抱え込む必要はありません。<br>状況を伺った上で、<span class="text-accent">正直にお伝えします。</span>';
$note  = $args['note']  ?? '※ ご相談は、ご依頼ではありません。';
$btn   = $args['btn']   ?? '無料で相談する';
$wrap  = $args['class'] ?? 'section container';
?>

<section class="<?php echo esc_attr($wrap); ?>">
  <div class="common-cta fade-up">
    <div class="common-cta__bg" aria-hidden="true"></div>

    <div class="common-cta__content">
      <h2 class="mb-md"><?php echo esc_html($title); ?></h2>

      <p class="common-cta__text text-lg">
        <?php echo wp_kses_post($text); ?>
      </p>

      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="common-cta__btn">
        <?php echo esc_html($btn); ?>
      </a>

      <p class="common-cta__note"><?php echo esc_html($note); ?></p>
    </div>
  </div>
</section>
