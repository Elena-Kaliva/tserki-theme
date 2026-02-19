<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package zaza
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>


<section class="section section--hero">

  <div class="section-content">

    <!-- Slider main container -->
    <div class="swiper">

      <div class="swiper-wrapper">

        <?php while (have_rows('home_slider')): the_row();
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $link = get_sub_field('link');
          $text_color = get_sub_field('text_color'); // Get the value of the select field

        ?>


          <div class="swiper-slide" style="background-image: url('<?php echo $image['url']; ?>');">
            <div class="slider-content container-fluid">
              <h1 class="roboto-light <?php echo $text_color === 'black' ? 'black' : ($text_color === 'white' ? 'white' : ''); ?>"><?= $title; ?></h1>
              <?php if ($link): ?>
                <a href="<?= $link['url']; ?>" class="button <?php echo $text_color === 'black' ? 'black' : ($text_color === 'white' ? 'white' : ''); ?>"><?= $link['title']; ?></a>
              <?php endif; ?>

            </div>


          </div>
        <?php endwhile; ?>
      </div>


    </div>



  </div>
</section>