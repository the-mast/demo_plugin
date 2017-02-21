<?php
namespace ari_plugin;
$defined_value = false;
function defined() {
    global $defined_value;
    return $defined_value;
}

use PHPUnit\Framework\TestCase;
set_plugin_basename("ari");
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'ari.php';

class test_ari extends TestCase {
    function setUp() {
        clear_all_mocks();
    }

    function test_ShouldAtlestExecuteActivationnAndi18nHooks() {
        global $defined_value;
        $defined_value = true;
        start_plugin();
        $this->assertTrue(expect("register_activation_hook")->to_have_been_called()->to_be_truthy() );
        $this->assertTrue(expect("register_deactivation_hook")->to_have_been_called()->to_be_truthy() );
        $this->assertTrue(expect("add_action")->to_have_been_called()->count() >0 );
    }

    function test_ShouldNotExecuteAnyHooks() {
        global $defined_value;
        $defined_value = false;
        start_plugin();
        $this->assertFalse(expect("register_activation_hook")->to_have_been_called()->to_be_truthy() );
        $this->assertFalse(expect("register_deactivation_hook")->to_have_been_called()->to_be_truthy() );
        $this->assertFalse(expect("add_action")->to_have_been_called()->count() >0 );
    }
}
