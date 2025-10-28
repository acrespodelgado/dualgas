<?php
/**
 * Template Name: Login Page
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

<div class="wrapper py-0" id="login">

	<div class="container" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="form text-center">
                        <label><?php _e( 'Usuario', 'understrap-master' ); ?></label>
                        <br>
                        <input type="text" name="agent-nick" id="agent-nick">
                        <br>
                        <label><?php _e( 'Contraseña', 'understrap-master' ); ?></label>
                        <br>
                        <input type="password" name="agent-password" id="agent-password">
                        <br>
                        <button type="button" class="btn btn-primary" id="agent-login"><?php _e( 'Iniciar sesión', 'understrap-master' ); ?></button>
                    </div>
                    
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
