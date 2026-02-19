<section class="events-section">
    <?php if (have_rows('events_section')): 
        while (have_rows('events_section')) : the_row(); // Ξεκινάμε το loop για το κύριο repeater

            $headtitle = get_sub_field('head_title');
            $headtext = get_sub_field('head_text');
        ?>
        <div class="intro-events container-sm justify-content-center align-items-center flex-column">
           
            <div class="head-title"><?= esc_html($headtitle); ?></div>
            <div class="head-text"><?= wp_kses_post($headtext); ?></div>

        </div>
        <div class="section--event">
            <?php if (have_rows('events_repeater')): ?>
                <div class="event-container text-center">
                    <?php while (have_rows('events_repeater')) : the_row();
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        $button_link = get_sub_field('link');
                        $readmore = get_sub_field('readmore');
                    ?>
                        <div class="p-6 shadow-md  event">
                            <?php if ($image): ?>
                                <img src="<?= esc_url($image); ?>" alt="<?= esc_attr($title); ?>" class="event-image">
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <div class="events-title-wrapper">
                                    <div class="event-title "><?= esc_html($title); ?></div>
                                    <div class="block-menu-item-dots"></div>
                                </div>
                            <?php endif; ?>
                            <?php if ($content): ?>
                                <div class="event-text"><?= esc_html($content); ?></div>
                            <?php endif; ?>
                            <!-- <div class="event-arrow">
                                <a href="<?= esc_url($button_link); ?>" class="arrow-link">
                                    <img src="<?= get_stylesheet_directory_uri(); ?>/img/arrow75.png" class="arrow-img">
                                    <span class="read-more"><?= esc_html($readmore); ?></span>
                                </a>
                            </div> -->
                        </div>
                    <?php endwhile; ?>
                </div> <!-- Κλείσιμο του grid container -->
            <?php endif; ?>
        </div> <!-- Κλείσιμο του section--row -->

    <?php endwhile; // Κλείσιμο του κύριου repeater ?>
    <?php endif;?>
</section>