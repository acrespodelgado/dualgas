<?php
/**
 * Template Name: Canal Etico 2 Page
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

<div class="wrapper py-0" id="etico-home">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="eticohome-content-1">
                        <?php masterslider("ms-18"); ?>
                    </div>

                    <div class="eticohome-content-2 p-80">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12 col-lg-6">
                                    <h1><?php _e( 'Canal Ético', 'understrap-master' ); ?></h1>
                                </div>
                                <div class="col col-12 col-lg-6">
                                    <p><?php _e( 'Dualgas proporciona un canal como instrumento de comunicación 
                                    y denuncia para su uso por parte de empleado y otros grupos de interés, que pretende dar cumplimiento 
                                    a los objetivos marcados tanto en el Código Ético como en el conjunto de políticas y procesos internos aprobados por la organización.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Todas las comunicaciones realizadas a través de este canal serán recibidas por el Comité de Cumplimiento Normativo, siendo confidenciales y podrán ser anónimas dado que la herramienta informática de seguridad utilizada garantiza el anonimato. 
                                    El remitente será protegido ante cualquier intento de represalia. Además, a las comunicaciones se les podrá adjuntar 
                                    la documentación que se considere oportuna.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'En el caso de que el remitente quiera identificarse, se ha habilitado en el Canal Ético un apartado opcional 
                                    donde introducir sus datos.', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="eticohome-content-3">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12 col-lg-6">
                                    <a href="<?php echo get_site_url();?>/enviar-comunicacion">
                                        <div class="green-background">
                                            <img src="<?php echo get_site_url();?>/img/enviar-comunicacion-icon.png" alt="Comunicacion" class="img-responsive">
                                            <h2><?php _e( 'Enviar una comunicación', 'understrap-master' ); ?></h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="col col-12 col-lg-6">
                                    <button data-toggle="modal" data-target="#modalCanal">
                                        <div class="green-background">
                                            <img src="<?php echo get_site_url();?>/img/linea-comunicacion-icon.png" alt="Comunicacion" class="img-responsive">
                                            <h2><?php _e( 'Línea de comunicación segura', 'understrap-master' ); ?></h2>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="eticohome-content-4 p-80">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12 text-center">
                                    <p><?php _e( '¿Tienes alguna duda sobre cómo utilizar el Canal Ético?', 'understrap-master' ); ?></p>
                                    <!--<i class="fa fa-question-circle-o" aria-hidden="true"></i>-->
                                    <h3><?php _e( '¿Sobre qué puedo informar?', 'understrap-master' ); ?></h3>
                                    <div class="text-left">
                                        <p><?php _e( 'Puede utilizar el Canal ético para informar sobre cualquier posible irregularidad, 
                                        incumplimiento o comportamiento contrario al Código de Ética Empresarial, la legislación o la normativa interna que rigen 
                                        este grupo, incluidas las siguientes cuestiones, entre otras: ', 'understrap-master' ); ?></p>
                                        <ol style="text-align: justify; margin: 0; padding-left: 0; text-align:justify;">
                                            <li><?php _e( 'Conductas relativas a recursos humanos', 'understrap-master' ); ?></li>
                                            <li><?php _e( 'Conductas relativas a Seguridad y Salud', 'understrap-master' ); ?></li>
                                            <li><?php _e( 'Conductas relativas a potencial fraude o corrupción', 'understrap-master' ); ?></li>
                                            <li><?php _e( 'Conductas relativas a Seguridad de la Información, Protección de Datos', 'understrap-master' ); ?></li>
                                            <li><?php _e( 'Otras', 'understrap-master' ); ?></li>
                                        </ol>
                                        <p><?php _e( 'Es importante que recuerdes que el Canal Ético gestiona únicamente comunicaciones relacionadas con 
                                        conductas que contravengan el Código Ético y de Conducta de Dualgas. ', 'understrap-master' ); ?></p>
                                        <p><?php _e( 'Para evitar malas prácticas en el uso del canal, se aplicarán criterios precisos para admitir las comunicaciones y con 
                                        la exigencia de responsabilidad civil, penal y administrativa de las personas que comuniquen hechos con abuso de derecho o vulnerando 
                                        el principio de buena fe.', 'understrap-master' ); ?></p>
                                    </div>
                                    <h3><?php _e( 'Enviar una comunicación anónima', 'understrap-master' ); ?></h3>
                                    <p><?php _e( 'El canal garantiza en todo momento la confidencialidad de las comunicaciones, puedes facilitar tus datos identificativos 
                                    y de contacto para facilitar la resolución de la incidencia o, si lo prefieres, también puedes hacer la comunicación de forma anónima. 
                                    Tienes la posibilidad de hacer seguimiento de tu incidencia y continuar las comunicaciones con el gestor del canal, generando una contraseña 
                                    para el acceso. ', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'En el formulario se podrá incluir todos los detalles sobre el asunto que le preocupa. Trata de ser tan específico como puedas en cuanto 
                                    a los nombres o departamentos, personas, documentos, políticas, lugares, fechas, horas, etc. Para el acceso, deberás aceptar previamente la Política de Privacidad.
                                    Podrás adjuntar documentos a la comunicación. Por favor, asegúrate que toda la información personal se haya borrado de los documentos adjuntos para preservar 
                                    tu identidad, si así lo deseas.', 'understrap-master' ); ?></p>
                                    <h3><?php _e( '¿Por qué creamos una línea de comunicación segura?', 'understrap-master' ); ?></h3>
                                    <p><?php _e( 'Cuando envíe la información, tiene la posibilidad de seguir la evolución y resolución del caso a través de la creación 
                                    de una línea de comunicación seguro.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Una vez creado la línea de comunicación segura, le recomendamos que verifique periódicamente si ha recibido información 
                                    al respecto o si se le ha solicitado aclaraciones o información adicional.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'Cuando configure una línea de comunicación segura, se le asignará un número de asunto, y deberá introducir una contraseña 
                                    que deberá utilizar al iniciar cada sesión.', 'understrap-master' ); ?></p>
                                    <p><?php _e( 'La información proporcionada será confidencial y, si usted lo desea, anónima.', 'understrap-master' ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="eticohome-content-5">
                        <div class="modal fade" id="modalCanal" tabindex="-1" role="dialog" aria-labelledby="modalCanalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCanalLabel">
                                            <?php _e( 'Introduzca una contraseña para abrir el canal de comunicación segura', 'understrap-master' ); ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col col-12">
                                                <input type="password" id="modal-password" name="modal-password" placeholder="Contraseña">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col col-12">
                                                <button type="button" class="btn btn-terciary" data-toggle="modal" data-target="#modalCaso" data-dismiss="modal">
                                                <?php _e( 'Inicie sesión con número de caso y su código de acceso', 'understrap-master' ); ?></button>
                                            </div>
                                            <div class="col col-12 col-lg-6">
                                                <button type="button" class="btn btn-primary" id="iniciar-canal"><?php _e( 'Iniciar sesión', 'understrap-master' ); ?></button>
                                            </div>
                                            <div class="col col-12 col-lg-6">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php _e( 'Cancelar', 'understrap-master' ); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalCaso" tabindex="-1" role="dialog" aria-labelledby="modalCasoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCasoLabel">
                                            <?php _e( 'Acceso al caso', 'understrap-master' ); ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col col-12">
                                                <p><?php _e( 'Si ha enviado un caso desde otro dispositivo y quisiera seguirlo, puede iniciar sesión aquí con el número de 
                                                    caso que se encuentra bajo la pestaña «Detalles» en el buzón de comunicación seguro del dispositivo original 
                                                    y su contraseña.', 'understrap-master' ); ?></p>
                                                <input type="number" id="modal-id-caso" name="modal-id-caso" placeholder="Id del caso">
                                                <input type="password" id="modal-password-caso" name="modal-password-caso" placeholder="Contraseña de acceso al caso">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row w-100">
                                            <div class="col col-12 col-lg-6">
                                                <button type="button" class="btn btn-primary" id="recuperar-canal"><?php _e( 'Iniciar sesión', 'understrap-master' ); ?></button>
                                            </div>
                                            <div class="col col-12 col-lg-6">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php _e( 'Cancelar', 'understrap-master' ); ?></button>
                                            </div>
                                        </div>
                                    </div>
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
