<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

			<a class="skip-link sr-only sr-only-focusable"
				href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

			<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white">

				<?php if ( 'container' == $container ) : ?>
				<div class="container m-0 p-60">
					<?php endif; ?>

					<a class="navbar-brand mb-0" href="<?php echo get_home_url() ?>">

						
<svg style="width: 200px;" width="338px" height="47px" viewBox="0 0 338 47" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="GIOIELLI-ROSSINI" fill="#000000">
            <path d="M86.666,0.776001 C72.522,0.776001 61.258,10.888 61.258,23.624 C61.258,36.872 71.69,46.536 85.962,46.536 C100.362,46.536 111.306,36.68 111.306,23.688 C111.306,17.224 108.362,10.952 103.242,6.6 C98.634,2.696 93.194,0.776001 86.666,0.776001 Z M86.474,2.76 C91.466,2.76 95.818,4.744 98.506,8.136 C101.194,11.592 102.538,16.584 102.538,23.176 C102.538,36.68 96.522,44.744 86.538,44.744 C81.866,44.744 77.514,42.568 74.378,38.728 C71.37,35.08 69.962,30.088 69.962,23.112 C69.962,10.376 76.17,2.76 86.474,2.76 Z" id="Shape" fill-rule="nonzero"></path>
            <path d="M118.927,45 L120.655,45.192 L124.558,42.248 C131.854,45.576 135.182,46.408 141.326,46.408 C147.342,46.408 152.655,45.128 155.727,42.888 C159.119,40.392 161.039,36.808 161.039,32.968 C161.039,29.64 159.631,26.568 156.943,24.008 C153.807,21.128 148.175,19.464 140.239,19.08 C131.343,18.696 127.822,17.608 125.006,14.536 C124.11,13.512 123.534,12.104 123.534,10.696 C123.534,6.024 128.718,3.08 136.846,3.08 C148.43,3.08 155.598,8.392 157.198,18.312 L158.862,18.312 L158.862,2.312 L157.326,2.312 L153.487,5.448 C147.407,2.248 142.991,1.096 137.039,1.096 C131.471,1.096 126.671,2.312 123.791,4.488 C120.335,7.048 118.286,10.824 118.286,14.6 C118.286,17.672 119.566,20.36 122.126,22.664 C125.326,25.544 130.958,27.208 138.19,27.528 C143.822,27.72 148.302,28.36 151.31,29.256 C151.95,29.512 152.655,29.896 153.359,30.472 C155.023,31.752 155.982,33.864 155.982,35.976 C155.982,41.16 150.415,44.68 142.031,44.68 C133.455,44.68 125.838,40.968 122.638,35.272 C121.678,33.544 121.103,31.688 120.655,29 L118.927,29 L118.927,45 Z" id="Path" fill-rule="nonzero"></path>
            <path d="M170.114,45 L171.842,45.192 L175.746,42.248 C183.042,45.576 186.37,46.408 192.514,46.408 C198.53,46.408 203.842,45.128 206.914,42.888 C210.306,40.392 212.226,36.808 212.226,32.968 C212.226,29.64 210.818,26.568 208.13,24.008 C204.994,21.128 199.362,19.464 191.426,19.08 C182.53,18.696 179.01,17.608 176.194,14.536 C175.298,13.512 174.722,12.104 174.722,10.696 C174.722,6.024 179.906,3.08 188.034,3.08 C199.618,3.08 206.786,8.392 208.386,18.312 L210.05,18.312 L210.05,2.312 L208.514,2.312 L204.674,5.448 C198.594,2.248 194.178,1.096 188.226,1.096 C182.658,1.096 177.858,2.312 174.978,4.488 C171.522,7.048 169.474,10.824 169.474,14.6 C169.474,17.672 170.754,20.36 173.314,22.664 C176.514,25.544 182.146,27.208 189.378,27.528 C195.01,27.72 199.49,28.36 202.498,29.256 C203.138,29.512 203.842,29.896 204.546,30.472 C206.21,31.752 207.17,33.864 207.17,35.976 C207.17,41.16 201.602,44.68 193.218,44.68 C184.642,44.68 177.026,40.968 173.826,35.272 C172.866,33.544 172.29,31.688 171.842,29 L170.114,29 L170.114,45 Z" id="Path" fill-rule="nonzero"></path>
            <polygon id="Path" fill-rule="nonzero" points="218.612 45 244.404 45 244.404 42.952 235.892 42.952 235.892 4.36 244.404 4.36 244.404 2.312 218.612 2.312 218.612 4.36 227.124 4.36 227.124 42.952 218.612 42.952"></polygon>
            <path d="M248.674,45 L267.682,45 L267.619,43.016 L265.698,43.016 C260.386,43.016 259.107,41.736 259.107,36.36 L259.107,6.792 L300.067,46.92 L301.731,46.92 L301.731,9.544 C301.731,7.176 301.987,6.344 302.883,5.448 C303.459,4.808 305.187,4.296 306.659,4.296 C307.107,4.296 307.363,4.296 307.875,4.36 L307.875,2.312 L291.362,2.312 L291.362,4.36 C298.402,4.168 299.555,4.872 299.619,9.288 L299.619,33.928 L266.851,2.312 L248.802,2.312 L248.802,4.36 L257.058,4.36 L257.058,36.36 C257.058,41.48 255.587,43.016 250.531,43.016 L248.674,43.016 L248.674,45 Z" id="Path" fill-rule="nonzero"></path>
            <polygon id="Path" fill-rule="nonzero" points="311.737 45 337.529 45 337.529 42.952 329.017 42.952 329.017 4.36 337.529 4.36 337.529 2.312 311.737 2.312 311.737 4.36 320.249 4.36 320.249 42.952 311.737 42.952"></polygon>
            <path d="M0.049,45 L25.777,45 L25.777,42.952 L17.138,42.952 L17.138,24.84 L30.897,24.84 C36.529,24.712 39.218,27.272 39.858,33.544 C40.498,39.048 41.137,41.096 42.609,42.76 C44.337,44.616 47.089,45.704 50.225,45.704 C53.361,45.704 55.538,44.68 56.69,42.696 C55,43 53,43 52.5,43 C50.068,43 49.393,41.288 48.945,35.912 C48.369,28.36 45.298,25.032 37.874,23.752 C46.002,22.984 50.418,19.208 50.418,13.064 C50.418,8.328 47.602,4.424 43.25,3.272 C40.562,2.568 38.194,2.312 34.098,2.312 L0.049,2.312 L0.049,4.36 L8.434,4.36 L8.434,42.952 L0.049,42.952 L0.049,45 Z M32.177,4.424 L17.138,4.424 L17.138,22.664 L30.513,22.664 C33.585,22.664 36.402,22.024 37.938,21.064 C40.37,19.464 41.777,16.648 41.777,13.64 C41.777,10.248 39.922,7.048 36.978,5.512 C35.506,4.68 34.417,4.424 32.177,4.424 Z" id="Shape"></path>
        </g>
    </g>
</svg>
					</a>

					<button class="navbar-toggler mobile-menu-toggler" onclick="openNav()" type="button">
						<span class="navbar-toggle-span"></span>
						<span class="navbar-toggle-span"></span>
					</button>

					<ul class="left-menu">
						<?php
            wp_nav_menu( array(
              'theme_location' => 'Left menu',
              'menu_id'        => 'Left menu',
            ) );
            ?>
					</ul>




					<div style="margin-left: auto;" role="complementary">

						<div class="d-inline-block">
							<ul class="right-menu mr-2">
								<?php
						wp_nav_menu( array(
						'theme_location' => 'Right menu',
						'menu_id'        => 'Right menu',
						) );
						?>

							</ul>
						</div>
						<div class="d-inline-block">
							<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
									$count = WC()->cart->cart_contents_count;
									?><ul class="menu list-unstyled">
								<li><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"
										title="<?php _e( 'View your shopping cart' ); ?>"><?php 
									if ( $count > 0 ) {
											?>
										<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
										<?php
									}
											?></a></li>
							</ul>

							<?php } ?>
						</div>
					</div>
					<!-- <div class="d-inline-block">
						<ul class="menu list-unstyled">
							<li>
								<a class="ml-3"  href="javascript:void(0)" onclick="openSearch()"><svg style=" vertical-align: middle; top: 5px; position: relative;" width="18" height="18" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9 17C13.418 17 17 13.418 17 9C17 4.582 13.418 1 9 1C4.582 1 1 4.582 1 9C1 13.418 4.582 17 9 17ZM15.709 15.002L23.708 23L23 23.708L15.002 15.709C13.409 17.134 11.305 18 9 18C4.029 18 0 13.971 0 9C0 4.029 4.029 0 9 0C13.971 0 18 4.029 18 9C18 11.305 17.134 13.409 15.709 15.002Z" fill="black"/>
</svg>
</a>
							</li>
						</ul>
					</div> -->

					<div id="mySidenav" class="sidenav">

						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						<?php
							wp_nav_menu( array(
							'theme_location' => 'Mobile menu',
							'menu_id'        => 'Mobile menu',
							) );
							?>
					</div>


					<?php if ( 'container' == $container ) : ?>
				</div><!-- .container -->
				<?php endif; ?>

			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->

		<script>
			/* Set the width of the side navigation to 250px */
			function openNav() {
				document.getElementById("mySidenav").style.width = "100%";
			}

			/* Set the width of the side navigation to 0 */
			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}

			function openSearch() {
				document.getElementById("search-overlay").classList.add("active");
			}

			function closeSearch() {
				document.getElementById("search-overlay").classList.remove("active");
			}
		</script>
		<!-- Search Overlay -->

		<div id="search-overlay" class="search-overlay">
			<a href="javascript:void(0)" class="close-search" onclick="closeSearch()">x</a>
			<div class="container">
				<div class="row">
					<div class="col-lg-4 offset-lg-4">
						<form role="search" method="get" class="woocommerce-product-search form-group"
							action="http://rossini-gioielli.test/">
							<div class="input-group">
								<label class="sr-only" for="woocommerce-product-search-field-0">Search for:</label>
								<input type="search" id="woocommerce-product-search-field-0"
									class="search-field field form-control form-control-lg" placeholder="Search products…" value="Earth"
									name="s">
								<input type="hidden" name="post_type" value="product">
								<span class="input-group-append">
									<button class="submit btn btn-primary" type="submit" value="Search">Search</button>
								</span>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>