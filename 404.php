<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package zaza
 */

get_header();
?>

<main id="primary" class="site-main">
	<style>
		.error-404 {
			min-height: 400px;
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
	<section class="error-404 not-found">
		<?php if (get_locale() == 'el') { ?>
			<h1>Η σελίδα δε βρέθηκε</h1>
		<?php	} else { ?>
			<h1>Page not found</h1>

		<?php }; ?>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
