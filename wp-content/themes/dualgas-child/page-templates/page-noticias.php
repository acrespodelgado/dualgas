<?php
/**
 * Template Name: Noticias Page
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

<div class="wrapper py-0" id="noticias">

    <main class="site-main" id="main" role="main">

        <div class="container-fluid" id="content">

            <div class="row">

                <div class="col-md-12 content-area p-0" id="primary">

                    <div class="noticias-content-1">
                        <?php masterslider("ms-17"); ?>

                        <div class="blue-background py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2><?php _e( 'Últimas Noticias', 'understrap-master' ); ?></h2>
                                        <p><?php _e( 'En esta sección recogemos los eventos de actualidad, así como los acontecimientos más destacados relacionados con nuestra empresa', 'understrap-master' ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- #primary -->

            </div><!-- .row end -->
        
        </div>

        <div class="container">

            <div class="noticias-content-2 row py-6">

            <?php 

                $args = array(
                    'post_type' => 'noticia',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $query = new WP_Query( $args );
                if($query->have_posts()) : 
                    while($query->have_posts()) : 
                        $query->the_post(); ?>
                        <div class="col-12">
                            <div class="noticia">
                                <div class="row mb-5">
                                    <div class="col-12 col-lg-4">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'noticias-size' ); ?>
                                    </div>
                                    <div class="col-12 col-lg-8 px-5 pt-4 pb-5">
                                        <h2><?php echo wp_trim_words(get_the_title(), 12); ?></h2>
                                        <?php if(get_field('descripcion-corta')) : ?>
                                            <p><?php echo get_field('descripcion-corta'); ?></p>
                                        <?php endif; ?>
                                        <a href="<?php echo get_post_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                            <?php _e( 'Más info', 'understrap-master' ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php 
                        endwhile; ?>
                <?php 
                wp_reset_postdata();
                endif; ?>
                
                <?php
                understrap_pagination( [
                    'current' => $paged,
                    'total'   => $query->max_num_pages,
                ] );
                ?>

            </div>

        </div><!-- #content -->

    </main><!-- #main -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
