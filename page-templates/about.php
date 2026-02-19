<?php

/**
 * Template Name: About
 * Template for displaying the cookies, privacy policy, e.t.c.
 *
 * @package zaza
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
$post_slug = $post->post_name;

get_header();



?>
<main id="primary" class="about-page">
  <div class="about-page-container">
    <div class="container">
      <?php if (have_rows('person')): ?>
        <?php while (have_rows('person')): the_row();
          // $image = get_sub_field('image')['url'];
          $title = get_sub_field('title');
          $quote = get_sub_field('quote');
          $content = get_sub_field('content');
        ?>
          <div class="row person mb-5">
            <div class="col-12">
              <div class="row">
                <!-- <div class="col-12 col-md-4 image mx-md-auto mb-4">
                  <img src="<?= $image; ?>" alt="">
                </div> -->
                <div class="col-12 col-md-9 text d-flex flex-column align-items-center m-auto about-text">
                  <h1><?= $title ?></h1>
                  <div class="quote"><?= $quote?></div>
                  <div class="about-content"<?= $content; ?></div>

                </div>
              </div>
            </div>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>

</main><!-- #main -->


<?php


get_footer();
?>