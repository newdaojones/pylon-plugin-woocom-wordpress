<?php

/**
 * Plugin Name: Backpack Pay - WooCommerce
 * Plugin URI: https://pylon.im
 * Author: notdevin
 * Author URI: https://anagency.xyz
 * Description: Backpack Pay integration for WooCommerce
 * Version: 0.1.0
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 */

// function backpack_pay_init()
// {
//     if (!class_exists('WooCommerce')) {
//         return;
//     }

//     require_once 'includes/class-backpack-pay-woocommerce.php';
// }

// add_action('plugins_loaded', 'backpack_pay_init');

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



