<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>
<nav class="d-md-block d-none col text-center woocommerce-account-navigation mb-3" role="navigation">
	<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
	<a class="d-inline-block text-decoration-none"
		href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
	<?php endforeach; ?>
</nav>

<div class="d-xs-block d-md-none">
	<p>
		<a class="btn btn-outline-primary d-block collapsed" id="category-menu-widget-btn" data-toggle="collapse"
			href="#category-menu-widget" role="button" aria-expanded="false" aria-controls="category-menu-widget">Menu</a>
	</p>
	<div class="row">
		<div class="col">
			<div class="collapse multi-collapse" id="category-menu-widget">
				<ul class="list-unstyled">
					<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
					<li>
						<a class="text-decoration-none"
							href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
					</li>
					<?php endforeach; ?>
				</ul>

			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>