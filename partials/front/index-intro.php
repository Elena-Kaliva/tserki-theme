<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package zaza
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>


<section class="section section--intro container-md">
  <div class="intro-content d-flex justify-content-center align-items-center flex-column">
    <?php
    $intro = get_field('home_intro');
    if ($intro): ?>
    <div class="intro-text">
      <h2 class=""><?= $intro['title']; ?></h2>
      <img class="intro-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_crop.png" alt="">
    </div>

      <!-- <img src="<//?php echo esc_attr($intro['image']['url']); ?>" alt=""> -->
      <div class="text text-center">
        <?php echo $intro['text']; ?>
      </div>


    <?php endif; ?>
  </div>
</section>