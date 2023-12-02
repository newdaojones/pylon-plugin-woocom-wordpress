<?php
class WC_Gateway_Backpack_Pay extends WC_Payment_Gateway
{

    public function __construct()
    {
        $this->id = 'backpack_pay_gateway';
        $this->icon = apply_filters('woocommerce_backpack_pay_gateway_icon', '');
        $this->has_fields = false;
        $this->method_title = __('Backpack Pay', 'backpack-pay-woocommerce');
        $this->method_description = __('Allows payments with Backpack Pay.', 'backpack-pay-woocommerce');

        // Load the settings.
        $this->init_form_fields();
        $this->init_settings();

        // Define user set variables
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->instructions = $this->get_option('instructions', $this->description);

        // Actions
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    }

    public function init_form_fields()
    {
        $this->form_fields = array(
            'enabled' => array(
                'title' => __('Enable/Disable', 'backpack-pay-woocommerce'),
                'type' => 'checkbox',
                'label' => __('Backpack Pay', 'backpack-pay-woocommerce'),
                'default' => 'yes'
            ),
            // Add other form fields here
        );
    }

    public function process_payment($order_id)
    {
        $order = wc_get_order($order_id);

        // Your code to call the payment gateway API

        // Return thankyou_redirect
        return array(
            'result' => 'success',
            'redirect' => $this->get_return_url($order)
        );
    }
}
