<?php
/**
 * Template Name: Personas Page
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

<div class="wrapper p-0" id="personas">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="personas-content-1">
                        <?php masterslider("ms-14"); ?>
                    </div>

                    <div class="personas-content-2 py-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <p><?php _e( 'Nuestro equipo humano crece día a día, y se incorporan al mismo personas que disfrutan con su profesión y 
                                    que quieren contribuir a hacer realidad nuestro proyecto. Buscamos personas dinámicas, innovadoras, colaboradoras y comprometidas en su día a día. 
                                    Que den valor a la calidad en el trabajo, al cliente y a la sociedad.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Con tu ayuda, trabajaremos para alcanzar el desarrollo sostenible, un crecimiento respetuoso con la sociedad y con el medio ambiente.', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="personas-content-3 py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-7 mb-4">
                                    <h3><?php _e( 'Si crees que tu perfil profesional puede encajar con el de Ametel no dudes en dejarnos tus datos:', 'understrap-master' ); ?></h3>
                                </div>
                                <div class="col-12 py-2">
                                    <?php echo do_shortcode( '[contact-form-7 id="202" title="Formulario currículum"]' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="personas-content-4 py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12">
                                    <?php masterslider("ms-20"); ?>
                                </div>
                            </div>
                            <div class="row py-5">
                                <div class="col col-12 col-lg-6">
                                    <h2><?php _e( 'AMETEL. LA SEGURIDAD ES COSA DE TODOS.', 'understrap-master' ); ?></h2>
                                </div>
                                <div class="col col-12 col-lg-6">
                                    <p><?php _e( 'Desde sus inicios, AMETEL ha adquirido un fuerte compromiso empresarial con los diversos integrantes que le acompañan en la 
                                    ejecución de su actividad apostando por sus trabajadores, sus proveedores y sus clientes. La estrategia preventiva de la compañía se fundamenta en 
                                    la concienciación y en la cultura preventiva, donde los trabajadores asumen el papel de mayor importancia. ', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid green-background p-0">
                            <div class="row">
                                <div class="col col-12 col-lg-6 offset-lg-3 py-5">
                                    <h3><?php _e( 'AMETEL tiene constituido un Servicio de Prevención Propio que cuenta con los medios humanos y materiales necesarios para realizar las actividades 
                                    preventivas garantizando la adecuada protección de la seguridad y salud de los trabajadores, asesorando y asistiendo a todos los agentes actuando además como dinamizador 
                                    de la prevención en todos los niveles jerárquicos. En esta ecuación, la total implicación de la Dirección en el proyecto preventivo, la complicidad de responsables y mandos 
                                    intermedios con el mismo y el liderazgo ejercido por los trabajadores dan como resultado una continua mejora en el contexto de la seguridad y salud en el trabajo.
                                    Porque la seguridad es cosa de todos y el objetivo de la organización es garantizar la salud de las personas que intervienen en nuestro proyecto, se trabaja desde distintas 
                                    líneas que permitan una mejora constante en seguridad. ', 'understrap-master' ); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col col-12">
                                    <div class="py-5">
                                        <p><?php _e( 'Entre estas líneas en las que los protagonistas son la integración y la participación, destacamos tres grandes bloques:', 'understrap-master' ); ?></p>
                                        <ul>
                                            <li><?php _e( 'Formación y entrenamiento.', 'understrap-master' ); ?></li>
                                            <li><?php _e( 'Información, comunicación y participación.', 'understrap-master' ); ?></li>
                                            <li><?php _e( 'Vigilancia, supervisión y asesoramiento preventivo.', 'understrap-master' ); ?></li>
                                            <li><?php _e( 'Vigilancia, supervisión y asesoramiento preventivo.', 'understrap-master' ); ?></li>
                                        </ul>
                                        <p><?php _e( 'Aunque existen muchas más líneas de trabajo que completan la estrategia preventiva de la compañía, el entrenamiento, la información, la comunicación, la participación, la supervisión 
                                        y el asesoramiento preventivo continuo son palabras clave dentro de nuestro enfoque de la actividad en materia de seguridad y salud en el trabajo.', 'understrap-master' ); ?></p>
                                    </div>
                                </div>
                                <div class="col col-12">
                                    <h4><?php _e( 'PREVENCIÓN EN CIFRAS', 'understrap-master' ); ?></h4>
                                    <p><?php _e( '32.000 Horas de formación impartidas.', 'understrap-master' ); ?></p>
                                    <p><?php _e( '1.700 Equipos de protección revisados, herramientas y equipos ensayados.', 'understrap-master' ); ?></p>
                                    <p><?php _e( '3.100 Inspecciones y visitas de seguridad a obra.', 'understrap-master' ); ?></p>
                                    <p><?php _e( '700 Planes de Seguridad y Procedimientos específicos', 'understrap-master' ); ?></p>
                                    <p><?php _e( '150 Nuevas Medidas Preventivas.', 'understrap-master' ); ?></p>
                                    <p><?php _e( '14 Campañas nuevas y planes de mejora específicos de seguridad.', 'understrap-master' ); ?></p>
                                    <p><?php _e( '800 Reconocimientos médicos', 'understrap-master' ); ?></p>
                                    <p><?php _e( '30.800 Documentos de trabajadores gestionados e intercambiados (al MES)', 'understrap-master' ); ?></p>
                                </div>
                                <div class="col col-12">
                                    <h4><?php _e( 'POLÍTICAS', 'understrap-master' ); ?></h4>
                                    <p><?php _e( 'AMETEL en su continuo compromiso de garantizar la seguridad y salud de los trabajadores en todos los aspectos derivados del trabajo y 
                                    de la actividad ha implantado las siguientes políticas:', 'understrap-master' ); ?></p>
                                    <ul>
                                        <li><?php _e( 'POLÍTICA DE SEGURIDAD', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'POLÍTICA DE INTERRUPCIÓN DE LA ACTIVIDAD', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'POLÍTICA CONTRA EL ALCOHOL Y LAS DROGAS', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'POLÍTICA DE SEGURIDAD VIAL', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'POLÍTICA FRENTE AL ACOSO ', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'POLÍTICA DE PROMOCIÓN DE LA SALUD', 'understrap-master' ); ?></li>
                                    </ul>
                                </div>
                                <div class="col col-12">
                                    <h4><?php _e( 'CERTIFICACIONES Y ASOCIACIONES', 'understrap-master' ); ?></h4>
                                    <ul>
                                        <li><?php _e( 'ISO 45001: 2018 Sistemas de gestión de salud y seguridad en el trabajo', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Auditoría Legal del Servicio de Prevención', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Certificado de Excelencia Preventiva', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Acreditación como entidad formadora dentro del Convenio Estatal del Metal por la Fundación Laboral del Metal.', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Adhesión a la declaración de Luxemburgo', 'understrap-master' ); ?></li>
                                        <li><?php _e( 'Comité de Formación y Prevención de ADEMI', 'understrap-master' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
