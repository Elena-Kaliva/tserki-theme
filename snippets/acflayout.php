


<?php if (have_rows('flexible content field label')): ?>
				<?php while (have_rows('flexible content field label')): the_row();?>




        <!-- repeater -->
					<?php if (get_row_layout() == 'field within the flexible content'): 
            $repeaternames=get_sub_field('repeatername');
            ?>
                <?php foreach ($repeaternames as $repeatername):?>
									<?= $repeatername['nameofthefield'];?>
							  <?php endforeach; ?>
					<?php endif; ?>

        <!-- //plain layout -->
        <?php if (get_row_layout() == 'banner'): 
						$title=get_sub_field('banner_title');
						$text=get_sub_field('banner_descriptive_text');
						$link=get_sub_field('banner_link');
						$image=get_sub_field('banner_image');

						?>
						<section>
								<?php if($title):?>
									<?= $title; ?>
								<?php endif; ?>

								<?php if($text):?>
									<?= $text; ?>
								<?php endif; ?>

								<?php if($link):?>
									<?= $link['url']; ?>
								<?php endif; ?>
								<?php if($image):?>
									<?= $image['url']; ?>
								<?php endif; ?>
						</section>
					<?php endif; ?>




				<?php endwhile; ?>
		<?php endif; ?>