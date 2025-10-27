<?php
/**
 * Template Name: Sostenibilidad Page
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

<div class="wrapper py-0" id="sostenibilidad">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="sostenibilidad-content-1">
                        <?php masterslider("ms-13"); ?>
                    </div>

                    <div class="sostenibilidad-content-2 p-80">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h2><?php _e( 'ACREDITACIONES Y HOMOLOGACIONES', 'understrap-master' ); ?></h2>
                                </div>
                                <div class="col-12 col-lg-6 px-40 mtxs-5">
                                    <p><?php _e( 'Tenemos homologadas nuestras principales lineas de negocio con Nedgia y con otros muchos clientes de alta exigencia.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Estamos registrados en Achilles-Repro.', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sostenibilidad-content-3 blue-background">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h2><?php _e( 'PREVENCIÓN, CALIDAD Y MEDIOAMBIENTE', 'understrap-master' ); ?></h2>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <p><?php _e( 'DUALGAS dispone de un Sistema de Gestión Integrado, que actualmente se encuentra en fase de Implantación y Seguimiento.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Asì mismo, de cara a un reducir el impacto ambiental de nuestra actividad, realizamos medición de nuestra huella de carbono, e implementando medidas tales como la renovación gradual de nuestra parque de vehiculos', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 col-lg-6">
                                    <img class='img-responsive w-100' src='<?php echo get_site_url();?>/img/sostenibilidad-1.png' alt='<?php _e( 'Farola', 'understrap-master' ); ?>'>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <img class='img-responsive w-100' src='<?php echo get_site_url();?>/img/sostenibilidad-2.png' alt='<?php _e( 'Visión y propósito', 'understrap-master' ); ?>'>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sostenibilidad-content-4">
                        <div class="container-fluid p-0">
                            <div class="row align-center">
                                <div class="col-12">
                                    <h4><?php _e( 'Descarga nuestros certificados', 'understrap-master' ); ?></h4>
                                </div>
                                <div class="col-12 col-lg-4 col-xl-3 mtxs-5">
                                    <h5><?php _e( 'Calidad', 'understrap-master' ); ?></h5>
                                    <p><?php _e( 'Norma ISO 9001:2015', 'understrap-master' ); ?></p>
                                    <a href="<?php echo get_site_url();?>/certificados/DUALGAS-CertificadoISO9001.pdf" target="_blank" download><?php _e( 'Descargar', 'understrap-master' ); ?></a>
                                </div>
                                <div class="col-12 col-lg-4 col-xl-3 mtxs-5">
                                    <h5><?php _e( 'Medio Ambiente', 'understrap-master' ); ?></h5>
                                    <p><?php _e( 'Norma ISO 14001:2015', 'understrap-master' ); ?></p>
                                    <a href="<?php echo get_site_url();?>/certificados/DUALGAS-CertificadoGestionAmbiental.pdf" target="_blank" download><?php _e( 'Descargar', 'understrap-master' ); ?></a>
                                </div>
                                <div class="col-12 col-lg-4 col-xl-3 mtxs-5">
                                    <h5><?php _e( 'Seguridad y Salud', 'understrap-master' ); ?></h5>
                                    <p><?php _e( '45001:2018', 'understrap-master' ); ?></p>
                                    <a href="<?php echo get_site_url();?>/certificados/DUALGAS-CertificadoSeguridad.pdf" target="_blank" download><?php _e( 'Descargar', 'understrap-master' ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
