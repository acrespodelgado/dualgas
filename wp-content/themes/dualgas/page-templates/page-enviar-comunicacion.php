<?php
/**
 * Template Name: Enviar Comunicacion Page
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

<div class="wrapper py-0" id="enviar-comunicacion">

    <div class="green-background">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php _e( 'Enviar una comunicación', 'understrap-master' ); ?></h1>
                </div>
            </div>
        </div>
    </div>

	<div class="container" id="content">

		<div class="row">

			<div class="col col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="comunicacion-content-1 py-5">
                        <?php echo do_shortcode('[contact-form-7 id="227" title="Formulario de comunicación"]'); ?>
                    </div>

                    <?php /*
                    <div class="comunicacion-content-2 py-2">
                        <h2><?php _e( 'Línea de comunicación segura', 'understrap-master' ); ?></h2>
Abra un Línea de comunicación segura. Esto hace que sea más seguro y fácil comunicarnos con usted.
Si desea permanecer en el anonimato, le sugerimos que utilice la Línea de comunicación segura para podernos comunicar con usted de forma segura y privada.
Utilice su contraseña de ahora en adelante para comunicarse con nosotros.
                    </div>
                    */ ?>
                    
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
