<?php 

    $args = array(
        'post_type' => 'noticia',
        'posts_per_page' => 4,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $query = new WP_Query( $args );
    if($query->have_posts()) : ?>
        <div class="col-12">
            <h2><?php _e( 'Últimas noticias', 'understrap-master' ); ?></h2>
            <span class="red-bar mt-3 mb-4"></span>
            <p><?php _e( 'En esta sección recogemos los eventos de actualidad, así como los acontecimientos 
            más destacados relacionados con nuestra empresa.', 'understrap-master' ); ?></p>
        </div>
    
    <?php while($query->have_posts()) : 
            $query->the_post(); ?>
            <div class="col-12">
                <div class="noticia">
                    <div class="row mb-5">
                        <div class="col-12 col-lg-4">
                            <?php echo get_the_post_thumbnail( $post->ID, 'noticias-size' ); ?>
                        </div>
                        <div class="col-12 col-lg-8 px-5 pt-4 pb-5">
                            <h3><?php echo wp_trim_words(get_the_title(), 8); ?></h3>
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