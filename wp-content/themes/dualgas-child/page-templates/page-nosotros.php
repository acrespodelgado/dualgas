<?php
/**
 * Template Name: Nosotros Page
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

<div class="wrapper py-0" id="nosotros">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="nosotros-content-1">
                        <?php masterslider("ms-15"); ?>
                    </div>

                    <div class="nosotros-content-2 p-80">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="green-text"><?php _e( 'DUALGAS se fundó en marzo de 1987. Desde su origen ha desarrollado actividades de construcción y mantenimiento de instalaciones eléctricas y de telecomunicaciones. Dualgas cuenta con el aval de una dilatada experiencia en las diversas áreas y actividades que desarrolla.', 'understrap-master' ); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nosotros-content-3 mb-5">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-9 blue-background">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-6 offset-md-3 py-6">
                                                <p><?php _e( 'En estos campos, la actividad ha evolucionado comprendiendo la ejecución de mantenimientos, realización de obras de nueva construcción y la gestión integrada de instalaciones llave en mano.', 'understrap-master' ); ?></p>
                                                <p><?php _e( 'En estas últimas se abarca todo el proceso desde la ingeniería, desarrollos de proyectos, dirección de obras, suministro y ejecución de las mismas incluyendo su puesta en servicio.', 'understrap-master' ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 px-0">
                                    <img class='img-responsive w-100' src='<?php echo get_site_url();?>/img/nosotros-1.png' alt='<?php _e( 'Nuestras instalaciones', 'understrap-master' ); ?>'>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nosotros-content-4 mb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6 mtxs-5">
                                    <img class='img-responsive w-80 mt-n-6' src='<?php echo get_site_url();?>/img/nosotros-2.png' alt='<?php _e( 'Líneas MT', 'understrap-master' ); ?>'>
                                    <img class='img-responsive w-100 my-5' src='<?php echo get_site_url();?>/img/nosotros-3.png' alt='<?php _e( 'Compañias', 'understrap-master' ); ?>'>
                                </div>
                                <div class="col-12 col-lg-6 align-self-center mtxs-5">
                                    <p><?php _e( 'DUALGAS acomete la mayoría de sus proyectos con personal y medios propios. Disponemos de recursos y personal para cubrir todas las etapas de un proyecto: desde la ingeniería, hasta la puesta en marcha, pasando por la topografía, la construcción, o incluso el posterior mantenimiento.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Actualmente DUALGAS desarrolla su actividad en 4 Unidades de Negocio distintas:', 'understrap-master' ); ?></p>
                                    <ul>
                                        <li><?php _e( 'Construcción y Mantenimiento de Redes de Acero', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Construcción y Mantenimiento de Redes de PE.', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Mantenimiento de Instalaciones Auxiliares', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Operaciones en el Punto de Suministro', 'understrap-master' ); ?></li>
                                    </ul>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nosotros-content-5 mb-5">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-3 px-0">
                                    <img class='img-responsive w-100' src='<?php echo get_site_url();?>/img/nosotros-4.png' alt='<?php _e( 'Nuestras instalaciones', 'understrap-master' ); ?>'>
                                </div>
                                <div class="col-12 col-lg-9 blue-background">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-md-6 offset-md-3 py-6">
                                                <p><?php _e( 'DUALGAS trabaja habitualmente con las principales compañías de transporte, distribución, y comercialización de energía.', 'understrap-master' ); ?></p>
                                                <p><?php _e( 'Somos Contratista Homologado de REE, Grupo Enel-ENDESA, IBERDROLA, entre otras importantes compañías.
                                                    Así mismo, DUALGAS dispone de diversas Clasificaciones como Contratista de Obras del Estado, además de estar inscrita Registro en RePro (nº: 301158), registro como empresa Instaladora de Telecomunicaciones, registro de Instaladores de Alta Tensión…etc.', 'understrap-master' ); ?></p>
                                                <p><?php _e( 'Todas estas Homologaciones y Acreditaciones son requisito indispensable para trabajar con Clientes con el alto grado de exigencia que tienen los nuestros.', 'understrap-master' ); ?></p>
                                            </div>
                                        </div>
                                    </div>
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
