<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zaza
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">

	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<!-- <style>
			.ebaner {
				display: block;
				margin: auto;
				text-align: center;
			}

			.ebaner img {
				border-style: none;
				height: auto;
				max-width: 100%;
			}
		</style>
		<a href="<?php echo get_stylesheet_directory_uri(); ?>/img/tserki.pdf" class="ebaner">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ebanner.jpg" alt="espa" class="">

		</a> -->

		<header id="masthead" class="site-header">
				<div class="menu-container container-fluid d-flex justify-space-between align-items-center">
					<div class="site-branding">
						<?php
						the_custom_logo();
						?>
					</div><!-- .site-branding -->
					<div class="menu-toggle ms-auto" id="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<nav id="site-navigation" class="main-navigation">

						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
					<div class="language-switcher"><?php pll_the_languages(array('show_flags' => 0, 'show_names' => 1, 'hide_if_no_translation’' => 1, 'hide_current' => 1,)); ?></div>
				</div>
		</header><!-- #masthead -->