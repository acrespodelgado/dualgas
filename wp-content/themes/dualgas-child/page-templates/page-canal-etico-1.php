<?php
/**
 * Template Name: Canal Etico 1 Page
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

<div class="wrapper py-0" id="etico">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="etico-content-1">
                        <?php masterslider("ms-18"); ?>
                    </div>

                    <div class="etico-content-2 p-80">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12 text-justify">
                                    <p><?php _e( 'En Dualgas aprobamos nuestro propio “Código Ético” que constituye el marco de referencia para asegurar una gestión responsable y un comportamiento ético de los miembros de nuestra organización.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Ponemos a disposición de todos los usuarios el Código Ético y Canal Ético como instrumento de comunicación y denuncia para su uso por parte de empleado y otros grupos de interés, que pretende dar cumplimiento a los objetivos marcados tanto en el Código Ético como en el conjunto de políticas y procesos internos aprobados por la organización.', 'understrap-master' ); ?></p>
                                    <br>
                                </div>
                                <div class="col col-12 text-center">
                                    <a href="<?php echo get_site_url();?>/certificados/DUALGAS-CodigoEtico.pdf" download><i class="fa fa-download" aria-hidden="true"></i><?php _e( 'Descargar Código Ético en pdf', 'understrap-master' ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="etico-content-3">
                        <?php masterslider("ms-19"); ?>
                    </div>
                    
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
