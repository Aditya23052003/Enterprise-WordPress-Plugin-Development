<?php
/**
 * Plugin Name: My Enterprise Plugin
 * Description: A custom plugin to enhance website functionality, including background job processing and API integrations.
 * Version: 1.0
 * Author: John Doe
 * Text Domain: my-enterprise-plugin
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/class-background-job.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-api-integration.php';

// Initialize the plugin
class MyEnterprisePlugin {

    public function __construct() {
        add_action('init', array($this, 'init_plugin'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function init_plugin() {
        new BackgroundJob();
        new ApiIntegration();
    }

    public function enqueue_scripts() {
        wp_enqueue_script('my-enterprise-custom-js', plugin_dir_url(__FILE__) . 'assets/js/custom.js', array('jquery'), '1.0', true);
    }
}

new MyEnterprisePlugin();

public function enqueue_scripts() {
    wp_enqueue_script('my-enterprise-custom-js', plugin_dir_url(__FILE__) . 'assets/js/custom.js', array('jquery'), '1.0', true);
    wp_localize_script('my-enterprise-custom-js', 'my_custom_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('my_custom_nonce')
    ));
}
