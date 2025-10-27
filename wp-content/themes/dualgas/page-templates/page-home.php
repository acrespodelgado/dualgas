<?php
/**
 * Template Name: Home Page
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

<div class="wrapper" id="home">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="home-content-1">
                        <?php masterslider("ms-1"); ?>
                    </div>

                    <div class="home-content-2 p-80">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <p class="underline"><?php _e( 'Sobre nosotros', 'understrap-master' ); ?></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h2><?php _e( 'Hola!', 'understrap-master' ); ?></h2>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h3><?php _e( 'DUALGAS se consolida como un referente en el desarrollo de proyectos de ingeniería, construcción y mantenimiento de greenes de distribución de gas,ofreciendo soluciones seguras, eficientes y adaptadas a las necesidades de cada cliente.Abarcamos un completo abanico de servicios, desde la construcción y el mantenimiento de greenes hasta la gestión integral de proyectos llave en mano. Esto incluye todas las fases del proceso: diseño de ingeniería, planificación, dirección de obra, suministro, ejecución y puesta en servicio.', 'understrap-master' ); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="home-content-3 center p-80">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h2><?php _e( 'Áreas de Especialización', 'understrap-master' ); ?></h2>
                                    <span></span>
                                    <p class="mt-4"><?php _e( 'Conoce a fondo todas nuestras Áreas de Especialización', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="home-content-4">
                        <?php masterslider("ms-3"); ?>
                        <div class="blue-bar"></div>
                        <?php masterslider("ms-2"); ?>
                        <div class="blue-bar"></div>
                        <?php masterslider("ms-4"); ?>
                        <div class="blue-bar"></div>
                        <?php masterslider("ms-22"); ?>
                        <div class="blue-bar"></div>
                    </div>

                    <div class="home-content-5 mb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="my-5">
                                    <?php _e( 'En Dualgas, combinamos experiencia, innovación y compromiso para ofrecer soluciones integrales que superen las expectativas', 'understrap-master' ); ?>
                                    </h4>
                                    <div id="carousel-partners" class="mb-5">
                                        <h7>Eléctricas</h7>
                                        <span class="green-bar"></span>
                                        <?php //echo do_shortcode('[mla_gallery attachment_category=electricas columns=6 size=full link=false]'); ?>
                                        <?php echo do_shortcode('[sp_wpcarousel id="342"]'); ?>
                                        <h7>Renovables</h7>
                                        <span class="green-bar"></span>
                                        <?php //echo do_shortcode('[mla_gallery attachment_category=renovables columns=6 size=full link=false]'); ?>
                                        <?php echo do_shortcode('[sp_wpcarousel id="343"]'); ?>
                                        <h7>Telecomunicaciones</h7>
                                        <span class="green-bar"></span>
                                        <?php //echo do_shortcode('[mla_gallery attachment_category=telecomunicaciones columns=6 size=full link=false]'); ?>
                                        <?php echo do_shortcode('[sp_wpcarousel id="344"]'); ?>
                                        <h7>Constructoras</h7>
                                        <span class="green-bar"></span>
                                        <?php //echo do_shortcode('[mla_gallery attachment_category=constructoras columns=6 size=full link=false]'); ?>
                                        <?php echo do_shortcode('[sp_wpcarousel id="345"]'); ?>
                                        <h7>Industrial</h7>
                                        <span class="green-bar"></span>
                                        <?php //echo do_shortcode('[mla_gallery attachment_category=industrial columns=6 size=full link=false]'); ?>
                                        <?php echo do_shortcode('[sp_wpcarousel id="346"]'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid logo py-4 my-4">
                            <div class="row">
                                <div class="col-12 col-md-2 offset-md-3">
                                    <div class="logo-text">
                                        <h5><?php _e( 'Calidad', 'understrap-master' ); ?></h5>
                                        <h6><?php _e( 'Norma ISO 9001:2015', 'understrap-master' ); ?></h6>
                                </div>
                                    <img src="<?php echo get_site_url();?>/img/NormaISO9001.png" alt="<?php _e( 'NormaISO9001.png', 'understrap-master' ); ?>" class="img-responsive">
                                </div>
                                <div class="col-12 col-md-2 mtxs-5">
                                    <div class="logo-text">
                                        <h5><?php _e( 'Medio Ambiente', 'understrap-master' ); ?></h5>
                                        <h6><?php _e( 'Norma ISO 14001:2015', 'understrap-master' ); ?></h6>
                                    </div>
                                    <img src="<?php echo get_site_url();?>/img/NormaISO14000.png" alt="<?php _e( 'NormaISO14000.png', 'understrap-master' ); ?>" class="img-responsive">
                                </div>
                                <div class="col-12 col-md-2 mtxs-5">
                                    <div class="logo-text">
                                        <h5><?php _e( 'Seguridad y Salud', 'understrap-master' ); ?></h5>
                                        <h6><?php _e( 'Norma ISO 45001:2018', 'understrap-master' ); ?></h6>
                                    </div>
                                    <img src="<?php echo get_site_url();?>/img/iso45001.png" alt="<?php _e( 'iso45001', 'understrap-master' ); ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="home-content-6 news my-5">
                        <div class="container">
                            <div class="row">
                                <?php include 'carrusel-noticia.php'; ?>
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
