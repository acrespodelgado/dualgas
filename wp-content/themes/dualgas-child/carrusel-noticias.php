<?php

    $args = array(
		'post_type' => 'noticias',
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC'
	);
	
	$query = new WP_Query( $args );
	if($query->have_posts()) : ?>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h5><?php _e( 'Últimas noticias', 'understrap-master' ); ?></h5>
                <span class="underline"></span>
                <p><?php _e( 'En esta sección recogemos los eventos de actualidad, así como los acontecimientos más destacados relacionados con nuestra empresa.', 'understrap-master' ); ?></p>
			</div>
		</div>
		<div class="row">
			<?php
			while($query->have_posts()) : 
				$query->the_post(); ?>
				<div class="col-12 col-md-6">
					<div class="img-container">
						<?php if( get_the_post_thumbnail( $post->ID, 'full' ) ) : ?>
							<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
						<?php else : ?>
							<img class='img-fluid' src='<?php echo get_site_url();?>/img/foto_no_foto.jpg' alt='<?php _e( '', 'understrap-master' ); ?>'>
						<?php endif; ?>
					</div>
                </div>
                <div class="col-12 col-md-6">

                    <h6><?php echo get_the_title(); ?></h6>
	
                    <?php if(types_render_field('descripcion-corta')) : ?>
                        <p><?php echo(types_render_field('descripcion-corta')); ?></p>
                    <?php endif; ?>
    
                    <?php if (get_the_content()) : ?>
                        <a class="btn btn-primary no-radius w-100" href="<?php echo get_post_field( 'post_name', get_post() ) ?>">
                            <?php _e( 'Ver más', 'understrap-master' ); ?>
                        </a>
                    <?php endif; ?>

				</div>
			<?php endwhile; ?>
		
		</div>
	</div>

<?php wp_reset_postdata(); endif; ?>