<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-2 widget-area d-xs-none d-sm-none d-md-block" id="left-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-2 d-none d-md-block widget-area" id="left-sidebar" role="complementary">
<?php endif; ?>
	<div class="left-sidebar">
		<?php dynamic_sidebar( 'left-sidebar' ); ?>

		<?php $terms = get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false)); ?>
			<div class="product-tags">
				<h3 class="widget-title"><?php esc_html_e( 'Collections', 'rossini' ); ?></h3>
				<ul class="list-unstyled">
				<?php foreach ( $terms as $term ) { ?>
					<li>
						<a href="<?php echo get_term_link( $term->term_id, 'product_tag' ); ?> " rel="tag"><?php echo $term->name; ?></a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</div><!-- #left-sidebar -->
