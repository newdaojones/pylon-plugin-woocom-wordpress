<?php

/**
 * Plugin Name: Backpack Pay - WooCommerce
 * Plugin URI: https://pylon.im
 * Author: notdevin
 * Author URI: https://anagency.xyz
 * Description: Backpack Pay integration for WooCommerce
 * Version: 0.1.1
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 */

function backpack_pay_admin_notice()
{
    ?>
    <div class="notice notice-success is-dismissible">
        <p>
            <?php _e('Hello World! Backpack Pay plugin is activated!', 'backpack-pay-woocommerce'); ?>
        </p>
    </div>
    <?php
}
add_action('admin_notices', 'backpack_pay_admin_notice');

function backpack_pay_activate()
{
    // Run your activation code here
}

function backpack_pay_deactivate()
{
    // Run your deactivation code here
}

register_activation_hook(__FILE__, 'backpack_pay_activate');
register_deactivation_hook(__FILE__, 'backpack_pay_deactivate');

// Include your payment gateway class file here
include_once plugin_dir_path(__FILE__) . 'includes/class-wc-gateway-backpack-pay.php';

function add_wc_gateway_backpack_pay_class($methods)
{
    $methods[] = 'WC_Gateway_Backpack_Pay'; // Your class name for the payment gateway
    return $methods;
}

function backpack_pay_init()
{
    if (!class_exists('WooCommerce'))
        return;
    add_filter('woocommerce_payment_gateways', 'add_wc_gateway_backpack_pay_class');
}

add_action('plugins_loaded', 'backpack_pay_init');



