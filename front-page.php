<?php

/**
 * The template for displaying homepage
 *
 * @package zaza
 */
global $post;
$post_slug = $post->post_name;
get_header();
?>
<main id="primary" class="main">
	<article id="<?php echo $post_slug; ?>" <?php post_class($post_slug); ?>>

		<?php get_template_part('partials/front/index', 'hero'); ?>
		<?php get_template_part('partials/front/index', 'intro'); ?>
		<?php get_template_part('partials/front/section-grid-row'); ?>

		<?php if (have_rows('content')): ?>
			<?php while (have_rows('content')): the_row(); ?>
				<?php //if (get_row_layout() == 'category_section'): ?>
					<?php //get_template_part('parts/section', 'category') ?>
				<?php //endif; ?> 

				<?php if (get_row_layout() == 'banner'): ?>
					<?php get_template_part('parts/section', 'banner') ?>
				<?php endif; ?>

			<?php endwhile; ?>
		<?php endif; ?>


		<?php get_template_part('partials/front/section-events'); ?>

	</article>
</main>
<?php

get_footer();
