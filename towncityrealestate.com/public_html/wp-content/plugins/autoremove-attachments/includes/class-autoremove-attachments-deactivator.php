<?php
/**
 * The file that contains the class fired during the plugin deactivation
 *
 * @since   1.0.0
 * @package Autoremove_Attachments
 */





/**
 * Fired during plugin deactivation.
 *
 * This class defines all the code that runs during the plugin deactivation.
 *
 * @since 1.0.0
 */
class Autoremove_Attachments_Deactivator {

	/**
	 * Initialize the class and get things started.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// Nothing yet.
	}





	/**
	 * Run the deactivation script.
	 *
	 * Run the deactivation script for the current site if we are on a standard
	 * WordPress install or for all sites if we are on WordPress Multisite
	 * and the plugin is network activated.
	 *
	 * @since 1.0.0
	 * @param bool $network_wide Boolean value with the network-wide activation status.
	 */
	public static function deactivate( $network_wide = false ) {
		if ( is_multisite() ) {
			if ( $network_wide ) {
				// Global variables.
				global $wpdb;

				// Variables.
				$blogs = $wpdb->get_results( "SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A );

				if ( $blogs ) {
					foreach ( $blogs as $blog ) {
						switch_to_blog( $blog['blog_id'] );

						Autoremove_Attachments_Deactivator::run_deactivation_script();
					}
					restore_current_blog();
				}
			} else {
				Autoremove_Attachments_Deactivator::run_deactivation_script();
			}
		} else {
			Autoremove_Attachments_Deactivator::run_deactivation_script();
		}
	}





	/**
	 * Do stuff on plugin deactivation.
	 *
	 * Long description goes here.
	 *
	 * @since 1.0.0
	 */
	public static function run_deactivation_script() {
		// Do something.
	}
}
