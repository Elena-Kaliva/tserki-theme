<section class="grid-section section--row">
<?php if( have_rows('rows_section') ): ?>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php while( have_rows('rows_section') ) : the_row(); 
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $content = get_sub_field('content');
          $button_link = get_sub_field('link');
          $readmore = get_sub_field('readmore');
      ?>
        <div class="swiper-slide" style="background-image: url('<?= esc_url($image); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
          <div class="flex-container p-6 shadow-md rounded-md text-center">
            <!-- <//?php if ($image): ?>
              <img src="<//?= esc_url($image); ?>" alt="" class="first-image" style="max-width: 100%; height: auto;">
            <//?php endif; ?> -->
            <?php if ($title): ?>
              <div class="row-title"><?= esc_html($title); ?></div>
            <?php endif; ?>
                <?php if ($content): ?>
                  <div class="row-text"><?= esc_html($content); ?></div>
                <?php endif; ?>
                <div class="row-arrow">
                  <a href="<?= esc_url($button_link); ?>" class="arrow-link">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow-white.png" class="arrow-img">
                    <span class="read-more"><?= esc_html($readmore); ?></span>
                  </a>
                </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
<?php endif; ?>
</section>
