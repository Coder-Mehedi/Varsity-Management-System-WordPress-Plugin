<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       mehedi.journeybyweb.com
 * @since      1.0.0
 *
 * @package    Varsity_Management_System
 * @subpackage Varsity_Management_System/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Varsity_Management_System
 * @subpackage Varsity_Management_System/includes
 * @author     Mehedi <mehedi5051@gmail.com>
 */
class Varsity_Management_System_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'varsity-management-system',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
