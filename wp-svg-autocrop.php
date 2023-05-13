<?php
/**
 * Plugin Name: SVG Autocrop
 * Description: Optimizes SVG files and trims them to have just a 1 pixel border, among other things.
 * Version:     0.1.1
 * Author:      fuerzastudio
 * Text Domain: wp-svg-autocrop
 * Domain Path: /languages
 *
 * @package WpSvgAutocrop
 */

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

define( 'WP_SVG_AUTOCROP_VERSION', '0.1.0' );

add_action( 'plugins_loaded', 'wp_svg_autocrop_verify_dependencies', 0 );

/**
 * Load the plugin classes.
 *
 * @return void
 */
function wp_svg_autocrop_initialize() {
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require __DIR__ . '/vendor/autoload.php';
		$core = new WpSvgAutocrop\Core( __FILE__ );
		do_action( 'wp_svg_autocrop_initialize' );
	}
}

/**
 * Verify the plugin dependencies.
 *
 * @return void
 */
function wp_svg_autocrop_verify_dependencies() {
	$is_active_save_svg = class_exists( '\SafeSvg\safe_svg' );

	if ( $is_active_save_svg ) {
		wp_svg_autocrop_initialize();
		return;
	}

	wp_svg_load_notice( 'missing_dependency' );

	add_action( 'admin_init', 'wp_svg_autocrop_deactivate' );
}

/**
 * Default admin notice markup.
 *
 * @param string $message The message text.
 * @param string $type The notice type (error, info, warning).
 *
 * @return void
 */
function wp_svg_autocrop_admin_notice_html( $message, $type = 'error' ) {
	?>
	<div class="<?php echo esc_html( $type ); ?> notice is-dismissible">
		<p>
			<strong><?php esc_html_e( 'SVG Autocrop', 'wp-svg-autocrop' ); ?>: </strong>
			<?php echo $message; // phpcs:ignore ?>
		</p>
	</div>
	<?php

	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}
}

/**
 * Function to add the missing dependency message.
 *
 * @return void
 */
function wp_svg_autocrop_missing_dependency() {
	wp_svg_autocrop_admin_notice_html(
		__( 'Safe SVG plugin is required.', 'wp-svg-autocrop' )
	);
}

/**
 * Add a custom admin notice.
 *
 * @param string $name The function name to be called.
 *
 * @return void
 */
function wp_svg_load_notice( $name ) {
	add_action( 'admin_notices', "wp_svg_autocrop_{$name}" );
}

/**
 * Deactivate the plugin.
 *
 * @return void
 */
function wp_svg_autocrop_deactivate() {
	deactivate_plugins( plugin_basename( __FILE__ ) );
}

/**
 * Setting a custom timeout value for cURL to avoid timeouts.
 * Using a high value for priority to ensure the function runs after any other added to the same action hook.
 *
 * @param int $handle Handle.
 */
function wp_svg_autocrop_custom_curl_timeout( $handle ) {
	curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 30 );
	curl_setopt( $handle, CURLOPT_TIMEOUT, 30 );
}
add_action( 'http_api_curl', 'wp_svg_autocrop_custom_curl_timeout', 9999, 1 );
