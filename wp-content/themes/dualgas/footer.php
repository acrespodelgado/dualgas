<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

	<div class="wrapper np" id="wrapper-footer">
		<footer class="site-footer" id="colophon">

			<?php masterslider("ms-7"); ?>

			<div class="green-bar"></div>

			<div class="site-info py-5">

				<div class="container pt-3">
					<div class="row">
						<div class="col-12 col-md-3 offset-md-2 pl-0">
							<img src="<?php echo get_site_url();?>/img/dualgas.svg" alt="<?php _e( 'Dualgas logo', 'understrap-master' ); ?>"/>
							<p><?php _e( 'DUALGAS es un referente en el desarrollo de proyectos de ingeniería, construcción y mantenimiento de redes de distribución de gas.', 'understrap-master' ); ?></p>
						</div>
						<div class="col-12 col-md-2 np">
							<h2><?php _e( 'DUALGAS', 'understrap-master' ); ?></h2>
							<ul>
								<li><a href="<?php echo get_site_url();?>/" title="<?php _e( 'Home', 'understrap-master' ); ?>"><?php _e( 'Home', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/nosotros/" title="<?php _e( 'Nosotros', 'understrap-master' ); ?>"><?php _e( 'Nosotros', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/areas-de-negocios/" title="<?php _e( 'Áreas de negocios', 'understrap-master' ); ?>"><?php _e( 'Áreas de negocios', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/sostenibilidad/" title="<?php _e( 'Sostenibilidad', 'understrap-master' ); ?>"><?php _e( 'Sostenibilidad', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/trabaja-con-nosotros/" title="<?php _e( 'Personas', 'understrap-master' ); ?>"><?php _e( 'Personas', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/contacto/" title="<?php _e( 'Contacto', 'understrap-master' ); ?>"><?php _e( 'Contacto', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/accionistas/" title="<?php _e( 'Accionistas', 'understrap-master' ); ?>"><?php _e( 'Accionistas', 'understrap-master' ); ?></a></li>
							</ul>
						</div>
						<div class="col-12 col-md-2 np">
							<h2><?php _e( 'CONTACTO', 'understrap-master' ); ?></h2>
							<ul>
								<li><a href="mailto:info@dualgas.es" target="_blank"><?php _e( 'info@dualgas.es', 'understrap-master' ); ?></a></li>
								<li><a href="tel:+34955263351" target="_blank"><?php _e( '(+34) 955 263 351', 'understrap-master' ); ?></a></li>
								<br>
								<h2><?php _e( 'CONTACTO RRHH', 'understrap-master' ); ?></h2>
								<li><a href="mailto:rrhhcv@dualgas.es" target="_blank"><?php _e( 'rrhhcv@dualgas.es', 'understrap-master' ); ?></a></li>
							</ul>
						</div>
						<div class="col-12 col-md-2 np">
							<h2><?php _e( 'LEGAL', 'understrap-master' ); ?></h2>
							<ul>
								<li><a href="<?php echo get_site_url();?>/aviso-legal/" title="<?php _e( 'Aviso legal', 'understrap-master' ); ?>"><?php _e( 'Aviso legal', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/politica-de-privacidad/" title="<?php _e( 'Privacidad', 'understrap-master' ); ?>"><?php _e( 'Privacidad', 'understrap-master' ); ?></a></li>
								<li><a href="<?php echo get_site_url();?>/politica-de-cookies/" title="<?php _e( 'Cookies', 'understrap-master' ); ?>"><?php _e( 'Cookies', 'understrap-master' ); ?></a></li>
							</ul>
						</div>
						<div class="col-12 col-md-8 offset-md-2 footer-border"></div>
						<div class="col-12 col-md-7 offset-md-2 pl-0 mt-3">
							<h2><?php _e( 'DÓNDE ESTAMOS', 'understrap-master' ); ?></h2>
							<ul>
								<li><?php _e( 'Poligono Industrial La Isla', 'understrap-master' ); ?></li>
								<li><?php _e( 'C/ Acueducto 104 derecha Dos Hermanas, Sevilla (España)', 'understrap-master' ); ?></li>
							</ul>
						</div>
						<div class="col-12 col-md-3 mt-3 np">
							<h2><?php _e( 'SÍGUENOS', 'understrap-master' ); ?></h2>
							<ul class="social">
								<li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li class="ml-2"><a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="ml-2"><a href="#" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div><!-- .site-info -->

			<div class="green-background">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center py-3">
							<p class="mb-0">©<?php echo date("Y"); ?><?php _e( ' - Dualgas. All rights reserved.', 'understrap-master' ); ?></p>
						</div>
					</div>
				</div>
			</div>

		</footer><!-- #colophon -->
	</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

