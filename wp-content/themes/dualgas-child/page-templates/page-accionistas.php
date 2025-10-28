<?php
/**
 * Template Name: Accionistas Page
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

<div id="accionistas" class="wrapper mt-6">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="py-5">
                    <h4 class="blue-text"><?php _e( 'CONVOCATORIA DE JUNTA GENERAL ORDINARIA', 'understrap-master' ); ?></h4>
                    
                    <p><?php _e( 'El Consejo de Administración en su reunión de fecha 23 de mayo de 2025 ha acordado convocar Junta General de Accionistas para el próximo día 28 de junio de 2025, a las 9:30 horas, en la sala de Juntas de la sede social de la compañía, en 1ª convocatoria, para deliberar y tratar sobre el siguiente', 'understrap-master' ); ?></p>
                    
                    <ol>
                        <li><?php _e( 'Examen y aprobación, si procede, de las cuentas anuales y los informes de gestión y auditoría correspondientes al ejercicio cerrado a 31 de diciembre de 2024.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Estudio y aprobación, si procede, del estado de información no financiera correspondiente al ejercicio cerrado a 31 de diciembre de 2024.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Análisis de la propuesta de aplicación del resultado formulada por el Consejo de Administración y aprobación, si procede, de la misma.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Aprobación, si procede, de la gestión del órgano de administración en el ejercicio referido y del importe máximo de la remuneración anual del conjunto de los administradores.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Análisis de la propuesta de modificación de estructura corporativa actual para la optimización de la misma.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Propuesta de actualización del acuerdo de dotación del Bolsín de Liquidez.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Facultad para ejecutar y elevar a público los acuerdos de la Junta.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Ruegos y preguntas.', 'understrap-master' ); ?></li>
                        <li><?php _e( 'Lectura y aprobación del Acta de la Reunión.', 'understrap-master' ); ?></li>
                    </ol>
                    
                    <p><?php _e( 'DERECHOS DE INFORMACIÓN: De conformidad con lo dispuesto por la Ley de Sociedades de Capital, en particular de lo establecido en los art. 197 y 272 de la misma, se comunica a los accionistas la posibilidad de formular preguntas por escrito, y de pedir información o aclaración, tanto antes como en la propia junta, así como de solicitar copia de los informes que resulten preceptivos y de las cuentas anuales a aprobar, informe de auditoría e informe de gestión, incluido estado de información no financiera, informando a los accionistas que esta documentación se encuentra, desde la convocatoria, a su disposición en el domicilio social de la empresa para su consulta o para ser remitidos a su domicilio a su solicitud, existiendo también la posibilidad de consultarla y descargarla directamente en:', 'understrap-master' ); ?></p>
                    
                    <a class="btn btn-primary mb-5" href="https://cloud.ametel.es/index.php/f/338705">Enlace documentación</a>
                    
                    <p><?php _e( 'En Dos Hermanas, a 28 de mayo de 2025.', 'understrap-master' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
