<?php
/**
 * Template Name: Contacto Page
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

<div class="wrapper py-0" id="contacto">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="contacto-content-1">
                        <?php masterslider("ms-16"); ?>
                    </div>

                    <div class="contacto-content-2 mt-6">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center"><?php _e( 'Nuestras sedes', 'understrap-master' ); ?></h2>
                                </div>
                                <?php 
                                    $args = array(
                                        'post_type' => 'sede',
                                        'posts_per_page' => -1,
                                        'orderby' => 'menu_order',
                                        'order' => 'ASC'
                                    );

                                    $query = new WP_Query( $args );
                                    if($query->have_posts()) : 
                                        while($query->have_posts()) : 
                                            $query->the_post(); 
                                ?>
                                        <div class="col-12 col-md-6 city">
                                            <div class="city-data-container">
                                                <h3 class="mb-4"><?php echo get_the_title(); ?></h3>
                                                <?php if(get_field('direccion')) : 
                                                        $text_area = get_field('direccion');
                                                        $text_area_arr = explode("\n", $text_area);
                                                        $direccion = array_map('trim', $text_area_arr);
                                                ?>
                                                    <ul>
                                                    <?php foreach ($direccion as $d) : ?>
                                                        <li><?php echo $d; ?></li>
                                                    <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if(get_field('telefono')) : ?>
                                                    <span>Teléfono: </span><a href="tel:<?php the_field('telefono');?>" class="tlf"><?php the_field('telefono');?></a>
                                                <?php endif; ?>
                                                <?php if(get_field('urlmaps')) : ?>
                                                    <a href="<?php the_field('urlmaps');?>" class="maps" target="_blank"><img src="<?php echo get_site_url();?>/img/maps-icon.svg" 
                                                    class="img-responsive icon" alt="Google maps"/> Ver en Google Maps </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                <?php 
                                        endwhile;
                                        wp_reset_postdata();
                                    else: ?>
                                        <div class="col-12">
                                            <h4><?php _e( 'No se han encontrado sedes.', 'understrap-master' ); ?></h4>
                                        </div>
                                <?php
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="contacto-content-3 mt-8 mb-6">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center"><?php _e( 'Contacta con nosotros', 'understrap-master' ); ?></h2>
                                    <?php echo do_shortcode('[contact-form-7 id="185" title="Formulario de contacto"]'); ?>
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
