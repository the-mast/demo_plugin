<?php

namespace ari_plugin;
class Ari_Admin {

	private $plugin_name;

	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    public function add_plugin_admin_menu() {
        add_options_page( 'Ari Base Options Functions Setup', 'Ari', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page') );
    }

    public function add_action_links( $links ) {
        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge(  $settings_link, $links );
    }

    public function display_plugin_setup_page() {
        return include_once( 'partials/ari-admin-display.php' );
    }

    public function validate($input) {
        $valid = array();
        $valid['ari_action'] = (isset($input['ari_action']) && !empty($input['ari_action'])) ? 1 : 0;
        $valid['brett_filter'] = (isset($input['brett_filter']) && !empty($input['brett_filter'])) ? 1: 0;

        return $valid;
    }

    public function options_update() {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }

	public function load_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_path( __FILE__ ) . 'css/ari-public.css', array(), $this->version, 'all' );
	}

	public function load_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_path( __FILE__ ) . 'js/ari-public.js', array( 'jquery' ), $this->version, false );
	}
}
