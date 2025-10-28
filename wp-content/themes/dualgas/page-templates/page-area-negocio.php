<?php
/**
 * Template Name: Area Negocio Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper p-0" id="area-negocio">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">

                    <div class="area-negocio-content-1">
                        <?php masterslider("ms-3"); ?>
                        <div class="green-bar"></div>
                        <?php masterslider("ms-2"); ?>                        
                        <div class="green-bar"></div>
                        <?php masterslider("ms-4"); ?>
                        <div class="green-bar"></div>
                        <?php masterslider("ms-22"); ?>
                        <div class="green-bar"></div>
                    </div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
