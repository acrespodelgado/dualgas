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
                        $id = $datos[0];
                        $nick = $datos[1];
                        $pass = $datos[2];

                        $sql_check = "SELECT id FROM agents WHERE password = '".$pass."' and nick = '".$nick."'";
                        $res_check = $mysqli->query($sql_check);

                        while ($fila = $res_check->fetch_object()) {
                            $id_check = $fila->id;
                        }

                        if($id == $id_check) {

                            $sql_chats = "SELECT id, code, created_at FROM chats WHERE state = 1 ORDER BY created_at DESC";
                            $res_chats = $mysqli->query($sql_chats);

                            if($res_chats) {
                    ?>
                            <div class="chats-activos">
                                <?php while($fila = $res_chats->fetch_object()) { ?>

                                    <?php 
                                        $sql_mensajes_leidos = "SELECT COUNT(id) as messages_readed FROM messages WHERE chat_id = " . $fila->id . " AND state = 0"; 
                                        $res_mensajes_leidos = $mysqli->query($sql_mensajes_leidos);

                                        while($fila_mensajes = $res_mensajes_leidos->fetch_object()) {
                                            $mensajes = $fila_mensajes->messages_readed;
                                        }
                                    ?>

                                    <div class="chat" id="<?php echo $fila->id .'-'. $fila->code; ?>">
                                        <p><?php echo "Chat " . $fila->code . " - Creado el " . $fila->created_at; ?></p>
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
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="error"><?php _e( 'Por favor, inicie sesión', 'understrap-master' ); ?></h1>
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
get_footer();
