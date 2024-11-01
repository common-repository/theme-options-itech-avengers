<?php
/*
Plugin Name: Theme Options - iTech Avengers
Plugin URI: http://wordpress.org/plugins/avengers-theme-options/
Description: In this Plugin 'Theme Options' you can easily manage your custom theme options such as your  Google Analytic Code, Facebook Pixel Code,  Google Tag Manager Code, social media links, Slider and much more.... You also have the option to add code to the header.php and footer.php files.
Requires at least: 5.0.0
Tested up to: 6.1
Version: 1.1.5
Author: iTech Avengers Team
Author URI: https://www.itechavengers.com/
Text Domain: itechavengers
License: GPLv3 or later
*/

/*
WP Theme Options is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WP Theme Options is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WP Theme Options. If not, see {URI to Plugin License}.
*/

// Make sure we don't expose any info if called directly
if ( basename( $_SERVER['PHP_SELF'] ) == basename( __FILE__ ) ) {
	die( 'Sorry, but you cannot access this page directly.' );
}

define( 'AVENGERS_VERSION', '1.1.1' );
define( 'AVENGERS_REQUIRED_WP_VERSION', '5.0.0' );
define( 'AVENGERS_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'AVENGERS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action( 'admin_enqueue_scripts', 'avengers_theme_options_style' );
add_action( 'admin_init', 'avengers_theme_options_init' );
add_action( 'admin_init', 'avengers_theme_options_init_footer' );
add_action( 'admin_menu', 'avengers_theme_options_add' ); 
add_action( 'admin_head', 'avengers_theme_options_icon' );
add_action( 'wp_head', 'avengers_add_header_tag' );
add_action( 'wp_footer', 'avengers_add_footer_tag' );

function avengers_theme_options_style() {
	wp_enqueue_style( 'avengers_custom_style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
	wp_enqueue_style( 'avengers_notices_style', plugin_dir_url( __FILE__ ) . 'assets/css/notices.css' );
	wp_enqueue_style( 'sweetalert2-css', plugin_dir_url( __FILE__ ) . 'assets/css/sweetalert2.min.css' );
	//wp_enqueue_style( 'avengers_custom_script', plugin_dir_url( __FILE__ ) . 'assets/js/avengers-settings-scripts.js' );
	//wp_enqueue_style( 'sweetalert2-js', plugin_dir_url( __FILE__ ) . 'assets/js/sweetalert2.all.min.js' );
}

function avengers_theme_options_init(){
	register_setting( 'avengers_options', 'avengers_theme_options');
} 
function avengers_theme_options_init_footer(){
	register_setting( 'avengers_options_footer', 'footer_options' );
} 

function avengers_theme_options_add() {
	add_menu_page( __( 'General', 'itechavengers' ), __( 'WP Theme Option', 'itechavengers' ), 'edit_themes', 'avengers-theme-options', 'avengers_theme_options_do', '', 56 );
	
	add_submenu_page('avengers-theme-options', 'General', 'General', 'edit_themes', 'avengers-theme-options',  'avengers_theme_options_do' );
	
	//add_submenu_page('avengers-theme-options', 'Top Bar', 'Top Bar', 'edit_themes', 'options-top-bar',  'avengers_theme_options_do_header' );
	
	//add_submenu_page('avengers-theme-options', 'Header', 'Header', 'edit_themes', 'options-header',  'avengers_theme_options_do_header' );
	
	//add_submenu_page('avengers-theme-options', 'Branding', 'Branding', 'edit_themes', 'options-branding',  'avengers_theme_options_do_branding' );
	
	//add_submenu_page('avengers-theme-options', 'Sidebar', 'Sidebar', 'edit_themes', 'options-sidebar',  'avengers_theme_options_do_header' );
	
	add_submenu_page('avengers-theme-options', 'Footer', 'Footer', 'edit_themes', 'options-footer',  'avengers_theme_options_do_footer' );
	
}

function avengers_theme_options_do() {
	global $select_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
			if ( false !== $_REQUEST['settings-updated'] ) :
			echo '<div class="update-message notice inline notice-alt updated-message notice-success">';
				echo '<p>';
				_e( 'Theme Options Saved :)', 'itechavengers' );
				echo '</p>';
			echo '</div>';
			endif;
			require_once( AVENGERS_PLUGIN_DIR . 'input-global.php' );
}
function avengers_theme_options_do_header() {
	global $select_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	if ( false !== $_REQUEST['settings-updated'] ) :
	echo '<div class="update-message notice inline notice-alt updated-message notice-success">';
	echo '<p>';
	_e( 'Theme Options Saved :)', 'itechavengers' );
	echo '</p>';
	echo '</div>';
	endif;
	require_once( AVENGERS_PLUGIN_DIR . 'options-header.php' );
}
function avengers_theme_options_do_footer() {
	global $select_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	if ( false !== $_REQUEST['settings-updated'] ) :
	echo '<div class="update-message notice inline notice-alt updated-message notice-success">';
	echo '<p>';
	_e( 'Theme Options Saved :)', 'itechavengers' );
	echo '</p>';
	echo '</div>';
	endif;
	require_once( AVENGERS_PLUGIN_DIR . 'options-footer.php' );
}


require_once( AVENGERS_PLUGIN_DIR . 'shortcodes.php' );

function avengers_add_header_tag()
{
	$avengersOptions = get_option( 'avengers_theme_options' );
		//echo esc_textarea( $avengersOptions['analytics']);
if($avengersOptions['analytics']){	
?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_textarea( $avengersOptions['analytics']); ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo esc_textarea( $avengersOptions['analytics']); ?>');
	</script>
<?php } if($avengersOptions['customCodeHeaderTag']){	?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
														  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
								})(window,document,'script','dataLayer','<?php echo esc_textarea( $avengersOptions['customCodeHeaderTag']); ?>');
	</script>
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_textarea( $avengersOptions['customCodeHeaderTag']); ?>"
				height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<?php
		}
	//echo esc_textarea( $avengersOptions['customCodeHeaderTag']);
}

function avengers_add_footer_tag()
{
	$avengersOptions = get_option( 'avengers_theme_options' );
	echo esc_textarea( $avengersOptions['customCodeFooterTag']);
}

function avengers_theme_options_icon() {
	echo sprintf(__( '<style>
		#adminmenu ##toplevel_page_avengers-theme-options div.wp-menu-image:before { content: "\f348"; }
	</style>' ) );
}
