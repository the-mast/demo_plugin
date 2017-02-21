<?php

namespace ari_plugin;

class Ari_Public {

    private $plugin_name;

    private $version;
    private $ari_options;

    public function __construct( $plugin_name, $version, $options ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->ari_options = $options;

    }

    public function ari_action() {
        if(!empty($this->ari_options["ari_action"])){
            return include_once("partials/ari-action.php") ;
        }

        return 0;
    }

    public function brett_filter() {
        if(!empty($this->ari_options["brett_filter"])){
            return include_once("partials/brett-filter.php");
        }

        return 0;
    }

	public function load_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_path( __FILE__ ) . "css/ari-public.css", array(), $this->version, "all" );
	}

	public function load_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_path( __FILE__ ) . "js/ari-public.js", array( "jquery" ), $this->version, false );
	}
}
