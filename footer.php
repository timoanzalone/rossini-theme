<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div id="wrapper-footer">

	<div class="container-fluid">

		<div class="row">

			<div class="col p-0">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<div class="text-center">
							<small>Copyright © 2019 Rossini Gioielli. All rights reserved.</small>
						</div>
						<!-- <?php understrap_site_info(); ?> -->
						<!-- <nav class="navbar navbar-expand-md navbar-dark">
						<?php if ( 'container' == $container ) : ?>
							<div class="container p-0  text-white">
						<?php endif; ?>
							<?php wp_nav_menu(
								array(
									'theme_location'  => 'footer',
									'container_class' => 'collapse navbar-collapse',
									'container_id'    => 'FooternavbarNavDropdown',
									'menu_class'      => 'navbar-nav ml-auto',
									'fallback_cb'     => '',
									'menu_id'         => 'footer-menu',
									'depth'           => 2,
									'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							);
							?>
						</nav> -->

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
</body>

</html>

