<?php
/**
 * Single noticia post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    
    <div class="container">
        <div class="row d-inline-flex mtxl-5">
            
            <div class="col-12 col-lg-6">
                <?php echo get_the_post_thumbnail( $post->ID, 'large w-100' ); ?>
            </div>

            <div class="col-12 col-lg-6 mtxs-5">
                <?php the_title( '<h1 class="entry-title mb-4">', '</h1>' ); ?>
            </div>

        </div>

        <div class="row">
            <?php if(get_field('descripcion')) : ?>
                <div class="col-12 mt-5">
                    <div class="my-3"><?php echo get_field('descripcion'); ?></div>
                </div>
            <?php endif; ?>
            <div class="col-12 mt-5">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php /*
    <footer class="entry-footer">

        <?php understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

    */ ?>
            
</article><!-- #post-## -->
