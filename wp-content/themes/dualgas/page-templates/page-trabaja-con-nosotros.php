<?php
/**
 * Template Name: Trabaja con Nosotros Page
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

<div class="wrapper p-0" id="personas">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="personas-content-1">
                        <?php masterslider("ms-14"); ?>
                    </div>

                    <div class="personas-content-2 py-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <p><?php _e( 'Nuestro equipo humano crece día a día, y se incorporan al mismo personas que disfrutan con su profesión y 
                                    que quieren contribuir a hacer realidad nuestro proyecto. Buscamos personas dinámicas, innovadoras, colaboradoras y comprometidas en su día a día. 
                                    Que den valor a la calidad en el trabajo, al cliente y a la sociedad.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Con tu ayuda, trabajaremos para alcanzar el desarrollo sostenible, un crecimiento respetuoso con la sociedad y con el medio ambiente.', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="personas-content-4 py-3">
                        <div class="container">
                            <div class="row">
							<!-- COMENTAR SI NO HAY OFERTAS DE EMPLEOS ACTIVAS --!>
                              <!--  <div class="col-12">
                                    <h3><?php _e( 'Ofertas de empleo', 'understrap-master' ); ?></h3>
                                    <p><?php _e( 'Si buscas un empleo y estas interesado en alguna de nuestras ofertas de empleo no dudes en dejarnos tu currículum', 'understrap-master' ); ?></p> 
                                </div> -->
                                <?php 

                                global $paged;
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $args = array(
                                    'post_type' => 'oferta-empleo',
                                    'posts_per_page' => 4,
                                    'paged' => $paged,
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                ); ?>
                        
                                <?php
                                $query = new WP_Query( $args );
                                if($query->have_posts()) : ?>
                                    <div class="col-12 py-2">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Puesto Vacante</th>
                                                    <th scope="col">Provincia</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <?php while($query->have_posts()) : 
                                        $query->the_post();
                                ?>
                                                <tr>
                                                    <td><a href="<?php echo get_post_permalink(); ?>"><?php if(get_field('fecha')) : the_field('fecha'); endif; ?></a></td>
                                                    <td><a href="<?php echo get_post_permalink(); ?>"><?php if(get_field('puesto_vacante')) : the_field('puesto_vacante'); endif; ?></a></td>
                                                    <td><a href="<?php echo get_post_permalink(); ?>"><?php if(get_field('provincia')) : the_field('provincia'); endif; ?></a></td>
                                                </tr>
                                            </a>
                                <?php endwhile;
                                    wp_reset_postdata();
                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                            <?php
                                endif;
                            ?>
                                <div class="col-12">
                                <?php
                                    understrap_pagination( [
                                        'current' => $paged,
                                        'total'   => $query->max_num_pages,
                                    ] );
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="personas-content-3 py-5">
                        <div class="container">
                            <div class="row">
								
                               <div class="col-12 col-md-7 mb-4">
                                    <h3><?php _e( 'Si crees que tu perfil profesional puede encajar con DUALGAS no dudes en dejarnos tus datos:', 'understrap-master' ); ?></h3>
                                </div> 
                                <div class="col-12 py-2">
                                    <?php echo do_shortcode( '[contact-form-7 id="202" title="Formulario currículum"]' ); ?>
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
