<?php
/**
 * Template Name: Prevención de Riesgos Page
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

<div class="wrapper py-0" id="prevencion">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="prevencion-content-1">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12">
                                    <?php masterslider("ms-20"); ?>
                                </div>
                            </div>
                            <div class="row py-5">
                                <div class="col col-12 col-lg-6">
                                    <h2><?php _e( 'LA SEGURIDAD, NUESTRA PRIORIDAD', 'understrap-master' ); ?></h2>
                                </div>
                                <div class="col col-12 col-lg-6">
                                    <p><?php _e( 'Tenemos homologadas nuestras principales lineas de negocio con Nedgia y con otros muchos clientes de alta exigencia.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Estamos registrados en Achilles-Repro.', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid blue-background">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col col-12 py-5">
                                            <p><?php _e( 'En DUALGAS la Seguridad y Salud en el Trabajo es la base fundamental de nuestra actividad.', 'understrap-master' ); ?></p>
                                            <p><?php _e( 'Con la meta de Cero Accidentes, integramos la prevención en todos nuestros procesos, niveles jerarquicos y alineamos nuestra estrategia con la de nuestros clientes.', 'understrap-master' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row align-center py-5">
                                <div class="col col-12 col-lg-5 py-5">
                                    <img class='img-responsive w-100' src='<?php echo get_site_url();?>/img/prevencion-1.png' alt='<?php _e( 'Técnico de prevención', 'understrap-master' ); ?>'>
                                </div>
                                <div class="col col-12 col-lg-7 py-5">
                                    <p><?php _e( 'Algunos datos que refrendan nuestra Cultura Preventiva:', 'understrap-master' ); ?></p>
                                    <ul>
                                        <li><?php _e( 'Más de 3.000 horas de formación teórico-pratica en PRL impartida cada año', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Más de 1.000 inspecciones de seguridad anuales', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Verificación anual de todos los EPIs, herramientas, maquinaria y equipos', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Semana Anual de la Prevención', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Campanas de concienciación y charlas diarias (Toolbox Talks)', 'understrap-master' ); ?></li>
                                    </ul>
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
