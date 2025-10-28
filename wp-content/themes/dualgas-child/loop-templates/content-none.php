<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section id="not-found" class="no-results not-found">

	<div class="container">
		<div class="row">
			<div class="col-12">

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'understrap' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php
					if ( is_search() ) :
						echo do_shortcode('[smartslider3 slider="5"]');
						
						printf(
							'<p>%s<p>',
							esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' )
						);
					else :
						printf(
							'<p>%s<p>',
							esc_html__( 'No disponemos actualmente de entradas sobre el tipo de dato que está buscando.', 'understrap' )
						);
					endif;
					?>
				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</section><!-- .no-results -->
