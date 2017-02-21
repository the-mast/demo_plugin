<?php
namespace ari_plugin;
use PHPUnit\Framework\TestCase;
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'class-ari-public.php';
class test_ari_public extends TestCase {

	function test_ari_action_shouldIncludeAriAction() {
        $options = array();
        $options["ari_action"] = 1;
        $ari = new ari_public("ari", "1.0.0", $options);
        $this->assertEquals(1, $ari->ari_action());
	}

	function test_ari_action_shouldNotIncludeAriAction() {
        $options = array();
        $ari = new ari_public("ari", "1.0.0", $options);
        $this->assertEquals(0,$ari->ari_action());
	}

	function test_brett_filter_shouldIncludeAriAction() {
        $options = array();
        $options["brett_filter"] = 1;
        $ari = new ari_public("ari", "1.0.0", $options);
        $this->assertEquals(1, $ari->brett_filter());
	}

	function test_load_stylesShouldCall_wp_enqueue_style() {
        $options = array();
        $ari = new ari_public("ari", "1.0.0", $options);
        $ari->load_styles();
        $this->assertTrue(expect("wp_enqueue_style")->to_have_been_called_with("ari", plugin_dir_path() . "css/ari-public.css", array(), "1.0.0", "all")->to_be_truthy() );
	}

	function test_load_scriptsShouldCall_wp_enqueue_style() {
        $options = array();
        $ari = new ari_public("ari", "1.0.0", $options);
        $ari->load_scripts();
        $this->assertTrue(expect("wp_enqueue_script")->to_have_been_called_with("ari", plugin_dir_path() . "js/ari-public.js", array("jquery"), "1.0.0", false)->to_be_truthy() );
	}

}
