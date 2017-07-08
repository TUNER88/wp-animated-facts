<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/TUNER88
 * @since      1.0.0
 *
 * @package    Wp_Animated_Facts
 * @subpackage Wp_Animated_Facts/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Animated_Facts
 * @subpackage Wp_Animated_Facts/includes
 * @author     TUNER88 <anton.pauli@gmail.com>
 */
class Wp_Animated_Facts_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-animated-facts',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
