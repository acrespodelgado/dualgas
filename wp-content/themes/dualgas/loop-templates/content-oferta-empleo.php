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
        <div class="row">
            <div class="col-12">
                <div class="mt-3">
                    <?php if(get_field('puesto_vacante')) : ?>
                        <p class="header"><?php _e( 'Puesto vacante:', 'understrap-master' ); ?>
                            <span class="text"><?php echo get_field('puesto_vacante'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('fecha')) : ?>
                        <p class="header"><?php _e( 'Fecha:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('fecha'); ?></span>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <h3><?php _e( 'Ubicación', 'understrap-master' ); ?></h3>
                    <span class="borde"></span>
                    <?php if(get_field('poblacion')) : ?>
                        <p class="header"><?php _e( 'Población:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('poblacion'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('provincia')) : ?>
                        <p class="header"><?php _e( 'Provincia:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('provincia'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('pais')) : ?>
                        <p class="header"><?php _e( 'País:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('pais'); ?></span>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <h3><?php _e( 'Descripción de la oferta', 'understrap-master' ); ?></h3>
                    <span class="borde"></span>
                    <?php if(get_field('puesto_vacante')) : ?>
                        <p class="header"><?php _e( 'Puesto Vacante:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('puesto_vacante'); ?></span>
                        </p>

                        
                    <?php endif; ?>
                    <!--<?php if(get_field('nivel')) : ?>
                        <p class="header"><?php _e( 'Nivel:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('nivel'); ?></span>
                        </p> -->
                    <?php endif; ?> 
                    <?php if(get_field('personal')) : ?>
                        <p class="header"><?php _e( 'Personal a cargo:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('personal'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('vacantes')) : ?>
                        <p class="header"><?php _e( 'Nº de vacantes disponibles:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('vacantes'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('descripcion')) : ?>
                        <p class="header"><?php _e( 'Descripción:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('descripcion'); ?></span>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <h3><?php _e( 'Requisitos', 'understrap-master' ); ?></h3>
                    <span class="borde"></span>
                    <?php if(get_field('estudios_minimos')) : ?>
                        <p class="header"><?php _e( 'Estudios mínimos:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('estudios_minimos'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('experiencia_minima')) : ?>
                        <p class="header"><?php _e( 'Experiencia mínima:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('experiencia_minima'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('residente')) : ?>
                        <p class="header"><?php _e( 'Residente en:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('residente'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('requisitos_minimos')) : ?>
                        <p class="header"><?php _e( 'Requisitos mínimos:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('requisitos_minimos'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('requisitos_deseados')) : ?>
                        <p class="header"><?php _e( 'Requisitos deseados:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('requisitos_deseados'); ?></span>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="mt-3">
                    <h3><?php _e( 'Contrato', 'understrap-master' ); ?></h3>
                    <span class="borde"></span>
                    <?php if(get_field('tipo_contrato')) : ?>
                        <p class="header"><?php _e( 'Tipo de contrato:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('tipo_contrato'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('duracion')) : ?>
                        <p class="header"><?php _e( 'Duración:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('duracion'); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(get_field('salario')) : ?>
                        <p class="header"><?php _e( 'Salario:', 'understrap-master' ); ?> 
                            <span class="text"><?php echo get_field('salario'); ?></span>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 mt-2">
                <a href="/trabaja-con-nosotros"><?php _e( 'Volver al listado de ofertas', 'understrap-master' ); ?></a>
            </div>
        </div>
    </div>

    <?php /*
    <footer class="entry-footer">

        <?php understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

    */ ?>
            
</article><!-- #post-## -->
