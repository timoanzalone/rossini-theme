<?php
/**
 * Template Name: Center Column
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper pt-3" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> p-0" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">
        <div class="col-md-8 offset-md-2">
          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'loop-templates/content', 'page' ); ?>

          <?php endwhile; // end of the loop. ?>
        </div>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
