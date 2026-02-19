<?php

/**
 * Template Name: Category Page
 *
 * Template for displaying the cookies, privacy policy, e.t.c.
 *
 * @package zaza
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
$post_slug = $post->post_name;

get_header();



?>
<main id="primary" class="category-page">
  <div class="category-page-container">
  <div class="brunch-arrow">
    <?php
    $default_id = 740;
    $brunch_page_id = pll_get_post($default_id);
    $brunch_url = get_permalink($brunch_page_id);
    ?>

    <?php if (get_field('back_to_brunch')) : ?>
      <a href="<?= esc_url($brunch_url); ?>" class="back-link">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/left-arrow.png">
      </a>
    <?php endif; ?>
  </div>
    <div class="category-intro">
      <h1 class="category-title"><?= the_title(); ?></h1>
      <div class="content text-center">
        <?= the_content(); ?>
      </div>
    </div>

  </div>
  <?php if( have_rows('categories') ): ?>
  <div class="category-grid">
    <div class="category-inner">
    <?php while( have_rows('categories') ): the_row();
      $category = get_sub_field('category');
      $image = $category['image'];
      $title = $category['title'];
      $link = $category['link']; 
    ?>
      <div class="category-item">
        <div class="image-wrapper">
          <?php if( $link ):?>
            <a href="<?php echo esc_url($link); ?>"data-caption="<?php echo esc_attr($title); ?>">
          <?php endif; ?>
              <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
          <?php if( $link ): ?>
            </a>
          <?php endif; ?>
          <div class="overlay">
            <span class="title"><?php echo esc_html($title); ?></span>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  </div>
<?php endif; ?>


  <?php if (have_rows('gallery')):
  ?>
    <div class="masonry-gallery container">
      <?php while (have_rows('gallery')): the_row();
        $image = get_sub_field('image');
        if ($image):
          // Randomly assign 'tall' for taller items
          $height_class = (rand(0, 1) === 1) ? 'tall' : '';
      ?>
          <div class="masonry-item <?php echo $height_class; ?>">
            <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($image['alt']); ?>">
              <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </a>
          </div>
      <?php endif;
      endwhile; ?>
    </div>
  <?php

  endif;
  ?>
</main><!-- #main -->


<?php


get_footer();
?>