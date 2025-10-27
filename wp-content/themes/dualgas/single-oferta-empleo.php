<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper oferta-empleo pt-0" id="single-wrapper">
	<div class="red-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php _e( 'Ofertas de empleo', 'understrap-master' ); ?></h1>
                    <p><?php _e( 'Si buscas un empleo y estas interesado en alguna de nuestras ofertas de empleo 
                    no dudes en dejarnos tu currículum.', 'understrap-master' ); ?></p>
                </div>
            </div>
        </div>
    </div>
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'oferta-empleo' );
					//understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
