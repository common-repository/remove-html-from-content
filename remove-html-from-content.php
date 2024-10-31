<?php
/**
 * Remove HTML From Content
 *
 * Plugin Name:       Remove HTML From Content
 * Plugin URI:        https://adamainsworth.co.uk/plugins/
 * Description:       Simple plugin that strips all but the most common HTML tags from the content of WordPress pages and posts.
 * Version:           1.0.1
 * Author:            Adam Ainsworth
 * Author URI:        https://adamainsworth.co.uk/
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       remove-html-from-content
 * Domain Path:       /languages
 * Requires at least: 3.0.1
 * Tested up to:      5.8
 */

 // redirect if some comes directly
if ( ! defined( 'WPINC' ) && ! defined( 'ABSPATH' ) ) {
	header('Location: /'); die;
}

// check that we're not defined somewhere else
if ( ! class_exists( 'Remove_Html_From_Content' ) ) {
	class Remove_Html_From_Content {
		private function __construct() {}

		public static function activate() {
	        if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			// any activation code here
		}

		public static function deactivate() {
	        if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			// any deactivation code here
		}

		public static function uninstall() {
	        if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			if ( __FILE__ !== WP_UNINSTALL_PLUGIN ) {
				return;
			}			 
		}

		public static function init() {
			add_action( 'the_content', [__CLASS__, 'do_filter'], 0 );
		}

		// run add an extra filter to the_content to remove all but the common html tags
		public static function do_filter($content) {
			$tags = array(
				'strong',
				'em',
				'u',
				'b',
				'i',
				'a',
				'ul',
				'ol',
				'li',
				'br'
			);
			$content = strip_tags($content, $tags);

			return $content;
		}	
	}

	register_activation_hook( __FILE__, [ 'Remove_Html_From_Content', 'activate' ] );
	register_deactivation_hook( __FILE__, [ 'Remove_Html_From_Content', 'deactivate' ] );
	register_uninstall_hook( __FILE__, [ 'Remove_Html_From_Content', 'uninstall' ] );
	add_action( 'plugins_loaded', [ 'Remove_Html_From_Content', 'init' ] );
}
