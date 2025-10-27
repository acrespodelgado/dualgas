<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

//Include custom css

add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles');

function custom_enqueue_styles() {
	wp_enqueue_style( 'custom-style', 
					  get_stylesheet_directory_uri() . '/css/custom.css', 
					  array(), 
					  wp_get_theme()->get('Version')
					);
}

//Include menu shortcode

function print_menu_shortcode($atts, $content = null) {
	extract(shortcode_atts(array( 'name' => null, 'class' => null ), $atts));
	return wp_nav_menu( array( 'menu' => $name, 'menu_class' => 'myclass', 'echo' => false ) );
}
	
add_shortcode('menu', 'print_menu_shortcode');

//Cropped images

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'noticias-size' );
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'noticias-size', 600, 600, true );
}

add_action('wp_enqueue_scripts', 'tutsplus_enqueue_custom_js');

add_filter( 'parse_query', 'ts_hide_pages_in_wp_admin' );
function ts_hide_pages_in_wp_admin($query) {
    global $pagenow,$post_type;
    if (is_admin() && $pagenow=='edit.php' && $post_type =='page') {
        $query->query_vars['post__not_in'] = array('739', '793' );
    }
}

function tutsplus_enqueue_custom_js() {
    wp_enqueue_script('custom', get_stylesheet_directory_uri().'/js/custom.js');
}

function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            width: auto !important;
            background-image: url("<?php echo get_site_url();?>/img/dualgas_login.png") !important;
            background-size: auto !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
