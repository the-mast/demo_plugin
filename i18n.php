<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.thoughtworks.com
 * @since      1.0.0
 *
 * @package    Ari
 * @subpackage Ari/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ari
 * @subpackage Ari/includes
 * @author     Brett <bstrydo@thoghtworks.comBrett>
 */
class i18n {


    private $plugin_name;
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
    function __construct($plugin_name) {
        $this->plugin_name =  $plugin_name;
    }

	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			$this->plugin_name,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
