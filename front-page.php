<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = 'container-fluid';

?>

<div class="wrapper pt-0" id="page-wrapper">
  <?php get_template_part( 'global-templates/hero', 'front' ); ?>
	<div class="<?php echo esc_attr( $container ); ?> p-0" id="content" tabindex="-1">

			<main class="site-main" id="main">

					<?php get_template_part( 'loop-templates/content', 'front' ); ?>

			</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
