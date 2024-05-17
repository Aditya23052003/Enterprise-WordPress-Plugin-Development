<?php
class ApiIntegration {

    public function __construct() {
        add_action('wp_ajax_my_custom_api_request', array($this, 'handle_api_request'));
        add_action('wp_ajax_nopriv_my_custom_api_request', array($this, 'handle_api_request'));
    }

    public function handle_api_request() {
        // Check nonce for security
        check_ajax_referer('my_custom_nonce', 'security');

        // Your API request logic here
        $response = wp_remote_get('https://api.example.com/data');
        
        if (is_wp_error($response)) {
            wp_send_json_error('API request failed');
        } else {
            $body = wp_remote_retrieve_body($response);
            wp_send_json_success(json_decode($body));
        }
    }
}
