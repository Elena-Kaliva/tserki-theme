<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zaza
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="left-content">
					<div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_2_crop.png"></div>
					<div class="contact-info">
						<?php if (get_locale() == 'el') { ?>
							<p class="">Επικοινωνία</p>
						<?php	} else { ?>
							<p class="">Contact</p>
						<?php }; ?>
						<div class="icontext">
							<div class="telephone d-flex flex-column">
								<div class="telephone-wrapper d-block">
									<p class="m-auto location">Paroikia</p>
									<a href="tel:+302284022821">
										<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/phone.svg" alt="" class="contact-icon">
										</span>
										+30 22840 22821
									</a>
								</div>
								<div class="telephone-wrapper d-block">
									<p class="m-auto location">Naousa</p>
									<a href="tel:+302284052077">
										<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/phone.svg" alt="" class="contact-icon">
										</span>
										+30 22840 52077
									</a>
								</div>
							</div>
						</div>
						<div class="icontext">
							<a href="mailto:sales@tserkiparos.gr">
								<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/email.svg" alt="" class="contact-icon">
								</span>
								sales@tserkiparos.gr
							</a>
						</div>
					</div>
					<div class="socials">
						<a href="https://www.instagram.com/tserkiparos/?hl=el" target="_blank">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/instagram.svg" alt="" class="socialicon">
						</a>
						<a href="https://www.facebook.com/tserkiparos" target="_blank">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.svg" alt="" class="socialicon">
						</a>
					</div>
				</div>

			</div>
			<div class="col-12 col-md-6">
				<!-- <a href="https://www.google.com/maps/place/Tserki+Paroikia/@37.0852784,25.1522188,17z/data=!3m1!4b1!4m6!3m5!1s0x1498710f6cffcae1:0xea6944b6febda91c!8m2!3d37.0852784!4d25.1547937!16s%2Fg%2F11c1ncxmtv?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/map.jpg" alt="" class="responsive-image">
				</a> -->
				<div id="map" style="height: 400px; width: 100%;"></div>

			</div>
		</div>
	</div>
</footer><!-- #colophon -->
<div class="bottom-footer">
	<div class="container">
		<small>Tserki © <?= date("Y");  ?> All Rights Reserved
	</div>

</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
<?php if (get_locale() == 'el') { ?>
<?php	} else { ?>
<?php }; ?>

</html>