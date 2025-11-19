<?php
/**
 * Template Name: Admin Panel Page
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

?>

<div class="wrapper py-0" id="admin-panel">

    <div class="container" id="content">

        <div class="row">

            <div class="col-md-12 content-area np" id="primary">

                <main class="site-main" id="main" role="main">
                    
                    <?php if(isset($_COOKIE['CookieAgente'])) { 
                        
                        $datos = explode("&", $_COOKIE['CookieAgente']);
                        
                        // Validar que la cookie tiene todos los datos
                        if (count($datos) >= 3) {
                            $id = $datos[0];
                            $nick = $datos[1];
                            $pass = $datos[2];

                            $stmt = $mysqli->prepare("SELECT id FROM agents WHERE password = ? AND nick = ?");
                            $stmt->bind_param("ss", $pass, $nick);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $id_check = null;
                            if ($row = $result->fetch_assoc()) {
                                $id_check = $row['id'];
                            }
                            $stmt->close();

                            if($id && $id_check && $id == $id_check) {

                                $stmt = $mysqli->prepare("SELECT id, code, created_at FROM chats WHERE state = 1 ORDER BY created_at DESC");
                                $stmt->execute();
                                $res_chats = $stmt->get_result();

                                if($res_chats && $res_chats->num_rows > 0) {
                        ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1><?php _e('Panel de Administración', 'understrap-master'); ?></h1>
                                            <p><?php _e('Bienvenido,', 'understrap-master'); ?> <?php echo htmlspecialchars($nick); ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="chats-activos">
                                    <?php while($fila = $res_chats->fetch_assoc()) { ?>

                                        <?php 
                                            $stmt_mensajes = $mysqli->prepare("SELECT COUNT(id) as messages_readed FROM messages WHERE chat_id = ? AND state = 0");
                                            $stmt_mensajes->bind_param("i", $fila['id']);
                                            $stmt_mensajes->execute();
                                            $res_mensajes = $stmt_mensajes->get_result();

                                            $mensajes = 0;
                                            if($row_mensajes = $res_mensajes->fetch_assoc()) {
                                                $mensajes = $row_mensajes['messages_readed'];
                                            }
                                            $stmt_mensajes->close();
                                        ?>

                                        <div class="chat" id="<?php echo htmlspecialchars($fila['id'] .'-'. $fila['code']); ?>">
                                            <p><?php echo "Chat " . htmlspecialchars($fila['code']) . " - Creado el " . htmlspecialchars(date('d/m/Y H:i:s', strtotime($fila['created_at']))); ?></p>
                                            <div class="mb-3">
                                                <span class="mensajes-nuevos">
                                                    <?php 
                                                    if($mensajes > 0) {
                                                        echo '<span class="important">'.$mensajes.'</span>'." Mensajes nuevos";
                                                    } else {
                                                        echo "Sin mensajes nuevos"; 
                                                    } ?>
                                                </span>
                                            </div>
                                            <div class="d-inline-flex">
                                                <button type="button" class="btn btn-primary acceder-chat"><?php _e( 'Acceder al chat', 'understrap-master' ); ?></button>
                                                <button type="button" class="btn btn-secondary button-cerrar-chat"><?php _e( 'Cerrar chat', 'understrap-master' ); ?></button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php 
                                $stmt->close();
                                } else { 
                                ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h1><?php _e('Panel de Administración', 'understrap-master'); ?></h1>
                                                <p><?php _e('Bienvenido,', 'understrap-master'); ?> <?php echo htmlspecialchars($nick); ?></p>
                                                <div class="blue-background mt-4">
                                                    <h3><?php _e('No hay chats activos', 'understrap-master'); ?></h3>
                                                    <p><?php _e('Actualmente no hay conversaciones abiertas en el sistema.', 'understrap-master'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                    if(isset($stmt)) $stmt->close();
                                }
                            } else {
                                ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="error"><?php _e( 'Sesión inválida', 'understrap-master' ); ?></h1>
                                            <p><?php _e( 'Por favor, inicie sesión nuevamente.', 'understrap-master' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="error"><?php _e( 'Cookie inválida', 'understrap-master' ); ?></h1>
                                        <p><?php _e( 'Por favor, inicie sesión nuevamente.', 'understrap-master' ); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else { ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="error"><?php _e( 'Por favor, inicie sesión', 'understrap-master' ); ?></h1>
                                    <a href="<?php echo get_site_url(); ?>/login-agente/" class="btn btn-primary">
                                        <?php _e( 'Ir al login', 'understrap-master' ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row end -->

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
$mysqli->close();
get_footer();
?>
