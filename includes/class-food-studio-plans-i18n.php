<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://foodstudiocr.com
 * @since      1.0.0
 *
 * @package    Food_Studio_Plans
 * @subpackage Food_Studio_Plans/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Food_Studio_Plans
 * @subpackage Food_Studio_Plans/includes
 * @author     Andrea Phillips Rojas <aphillipsr@gmail.com>
 */
class Food_Studio_Plans_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'food-studio-plans',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
