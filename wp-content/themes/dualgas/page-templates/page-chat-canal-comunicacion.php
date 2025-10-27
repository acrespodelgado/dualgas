<?php
/**
 * Template Name: Chat Canal Comunicacion Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

session_start();

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli->set_charset("utf8");

date_default_timezone_set('Europe/Madrid');
?>

<div class="wrapper py-0" id="chat">

	<div class="container" id="content">

		<div class="row">

			<div class="col col-md-12 content-area np" id="primary">

				<main class="site-main" id="main" role="main">
                    
                    <div class="chat-content-1 py-5">

                        <?php if(isset($_COOKIE['CookieCaso'])) { ?>
                            <?php 

                                $datos = explode("&", $_COOKIE['CookieCaso']);

                                $id = $datos[0];
                                $code = $datos[1];
                                $pass = $datos[2];

                                $now = new DateTime(null, new DateTimeZone('Europe/Madrid'));

                                $sql_check = "SELECT id, state, created_at FROM chats WHERE password = '".$pass."' and code = '".$code."'";
                                $res_check = $mysqli->query($sql_check);

                                while ($fila = $res_check->fetch_object()) {
                                    $id_check = $fila->id;
                                    $state = $fila->state;
                                    $created_at = $fila->created_at;
                                }

                                $created = date('d/m/Y H:i:s', strtotime($created_at));

                                if(isset($_COOKIE['CookieAgente'])) {
                                    if(is_array($datos_agente) && count($datos_agente) >= 3) {
                                        $id_agente = $datos_agente[0];
                                        $nick = $datos_agente[1];
                                        $pass = $datos_agente[2];

                                        $sql_check = "SELECT id FROM agents WHERE password = ? AND nick = ?";
                                        $stmt = $mysqli->prepare($sql_check);
                                        $stmt->bind_param("ss", $pass, $nick);
                                        $stmt->execute();
                                        $res_check = $stmt->get_result();

                                        $id_check_agent = null;
                                        while ($fila = $res_check->fetch_object()) {
                                            $id_check_agent = $fila->id;
                                        }
    
                                        if($id_check_agent !== null && $id_agente == $id_check_agent) {
                                            // Utiliza consultas preparadas para evitar inyecciones SQL
                                            $sql_mensajes_leidos = "UPDATE messages SET state = 1 WHERE chat_id = ?";
                                            $stmt = $mysqli->prepare($sql_mensajes_leidos);
                                            $stmt->bind_param("i", $id);
                                            $stmt->execute();
                                        }
                                    }
                                }

                                if($id == $id_check && $state == 1) {
                            ?>
                                <div class="container">
                                    <div class="row info">
                                        <div class="col col-12 col-lg-4 mb-5">
                                            <h1><?php _e( 'Recuerde su identificador del caso y contraseña para acceder de nuevo al chat.', 'understrap-master' ); ?></h1>
                                            <h2><?php _e( 'Identificador del caso: ', 'understrap-master' ); ?></h2>
                                            <p><?php echo $code; ?> </p>
                                            <h2><?php _e( 'Estado: ', 'understrap-master' ); ?> </h2>
                                            <p><?php echo $state == 0 ? 'Cerrado' : 'Abierto'; ?></p>
                                            <h2><?php _e( 'Creado el: ', 'understrap-master' ); ?> </h2>
                                            <p><?php echo $created; ?></p>
                                            <?php if(isset($id_agente)) { ?>
                                                <a href="<?php echo get_site_url();?>/admin-panel/" class="btn btn-primary"><?php _e( 'Atrás', 'understrap-master' ); ?></a>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-primary" id="log-out"><?php _e( 'Cerrar sesión', 'understrap-master' ); ?></button>
                                            <?php } ?>
                                        </div>

                                        <div class="col col-12 col-lg-8 chat-box">
                                            <div class="top">
                                                <h4><i class="fa fa-user-plus" aria-hidden="true"></i> <?php _e( 'Por el administrador: ', 'understrap-master' ); ?></h4>
                                                <p><?php echo $now->format('d/m/Y H:i:s'); ?></p>
                                                <br>
                                                <p><?php _e( 'Utilice este chat para comunicarse con nosotros de forma anónima. Usted puede utilizar este sistema para ampliar 
                                                información relativa a una consulta. ', 'understrap-master' ); ?></p>
                                                <p class="bold"><?php _e( 'Por favor, si desea consultar nuestra respuesta más adelante, recuerde el código y contraseña de esta sala 
                                                con el fin de poder acceder una vez haya enviado su mensaje, gracias. ', 'understrap-master' ); ?>
                                            </div>
                                            <?php 
                                                $sql_mensajes = "SELECT messages.content, messages.sent_at, messageSendBy.agent_id, agents.nick "; 
                                                $sql_mensajes = $sql_mensajes."FROM messages INNER JOIN messageSendBy ON messages.id = messageSendBy.message_id ";
                                                $sql_mensajes = $sql_mensajes."INNER JOIN agents ON messageSendBy.agent_id = agents.id ";  
                                                $sql_mensajes = $sql_mensajes."WHERE messages.chat_id = '".$id."'";
                                                $res_mensajes = $mysqli->query($sql_mensajes);
                                                
                                            ?>
                                        
                                                <div class="messages">
                                                    <?php while($fila = $res_mensajes->fetch_object()) { ?>
                                                        <div class="<?php echo $fila->agent_id > 1 ? 'message-agent' : 'message'; ?>">
                                                            <?php echo $fila->agent_id > 1 ? '<span class="agent">'.$fila->nick.'</span>' : ''; ?>
                                                            <p><?php echo $fila->content; ?></p>
                                                            <span class="date"><?php echo date('d/m/Y H:i:s', strtotime($fila->sent_at)); ?></span>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                            <div class="bottom">
                                                <input type="hidden" id="input-codigo-caso" name="input-codigo-caso" value="<?php echo $code; ?>">
                                                <input type="hidden" id="input-id-caso" name="input-id-caso" value="<?php echo $id_check; ?>">
                                                <?php if(isset($id_agente)) { ?>
                                                    <input type="hidden" id="input-id-agente" name="input-id-agente" value="<?php echo $id_agente; ?>">
                                                <?php } ?>
                                                <textarea id="input-chat-text" name="chat-text" placeholder="Escriba su mensaje..."></textarea>
                                                <button type="button" id="enviar-mensaje" class="btn btn-primary"><?php _e( 'Enviar', 'understrap-master' ); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                } else { 
                            ?>
                                    <div class="error">
                                        <h1><?php _e( 'No se ha encontrado un chat activo', 'understrap-master' ); ?></h1>
                                        <a href="<?php echo get_site_url();?>/canal-etico-home/"><?php _e( 'Accede a nuestro canal de comunicación', 'understrap-master' ); ?></a>
                                    </div>
                            <?php
                                }

                            ?>
                            
                        <?php } else { ?>
                            <div class="error">
                                <h1><?php _e( 'No se ha encontrado un chat activo', 'understrap-master' ); ?></h1>
                                <a href="<?php echo get_site_url();?>/canal-etico-home/"><?php _e( 'Accede a nuestro canal de comunicación', 'understrap-master' ); ?></a>
                            </div>
                        <?php } ?>
                    </div>
                    
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
