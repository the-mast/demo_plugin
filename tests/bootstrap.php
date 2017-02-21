<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Ari
 */

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/ari.php';
}
	require dirname( dirname( __FILE__ ) ) . '/lib/wp_mocker/wp_mocker.php';
