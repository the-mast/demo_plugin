<?php

/**
 * @link              www.thoughtworks.com
 * @since             1.0.0
 * @package           Ari
 *
 * @wordpress-plugin
 * Plugin Name:       ari
 * Plugin URI:        www.thoughtworks.com
 * Description:       This plugin is to make Ari happy
 * Version:           1.0.0
 * Author:            Brett
 * Author URI:        www.thoughtworks.com
 */

namespace ari_plugin;

$plugin_name = "ari";
$version = "1.0.0";
$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $plugin_name . '.php' );

function activate_plugin() {
}

function deactivate_plugin() {
}

function start_plugin() {
    global $plugin_name, $version, $plugin_basename;
    if ( !defined( "WPINC" ) )
        return;

    register_activation_hook( __FILE__, "ari_plugin\activate_plugin" );
    register_deactivation_hook( __FILE__, "ari_plugin\deactivate_plugin" );

    require_once plugin_dir_path( __FILE__ ) . "i18n.php";
    $i18n = new \i18n($plugin_name);
    add_action( "plugins_loaded", array( $i18n, "load_plugin_textdomain" ), 10, 1);

    //admin actions and filters
    require_once plugin_dir_path( __FILE__ ) . "class-ari-admin.php";
    $admin = new Ari_Admin($plugin_name, $version);
    add_action( "admin_menu", array($admin, "add_plugin_admin_menu"), 10, 1 );
    add_action( "admin_init", array($admin, "options_update"), 10, 1 );
    add_action( 'admin_enqueue_scripts', array($admin, 'load_styles'), 10, 1 );
    add_action( 'admin_enqueue_scripts', array($admin, 'load_scripts'), 10, 1 );
    add_filter( "plugin_action_links_" . $plugin_basename, array($admin, "add_action_links"), 10, 1 );

    //public actions and filters
    require_once plugin_dir_path( __FILE__ ) . "class-ari-public.php";
    $public = new Ari_Public($plugin_name, $version, get_option($plugin_name) );
    add_action( "wp_head", array($public, "ari_action"), 10, 1 );
    add_filter( "wp_head", array($public, "brett_filter"), 10, 1 );
    add_action( 'wp_enqueue_scripts', array($public, 'load_styles'), 10, 1 );
    add_action( 'wp_enqueue_scripts', array($public, 'load_scripts'), 10, 1 );
}

start_plugin();
