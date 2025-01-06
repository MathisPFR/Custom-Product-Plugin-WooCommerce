<?php
class Custom_Product_Email_Handler
{
    public function __construct()
    {
        add_filter('woocommerce_email_order_meta_fields', array($this, 'add_custom_message_to_email'), 10, 3);
    }

    public function add_custom_message_to_email($fields, $sent_to_admin, $order)
    {
        foreach ($order->get_items() as $item) {
            if (is_a($item, 'WC_Order_Item_Product')) { // Vérifie que l'élément est un produit
                $product_id = $item->get_product_id();

                // Vérifie si le produit a activé l'input personnalisé
                if (get_post_meta($product_id, '_enable_custom_input', true) === 'yes') {
                    $custom_message = $item->get_meta('Message personnalisé');
                    if ($custom_message) {
                        $fields['custom_message_' . $product_id] = array(
                            'label' => 'Message personnalisé',
                            'value' => stripslashes($custom_message),
                        );
                    }
                }
            }
        }
        return $fields;
    }
}

new Custom_Product_Email_Handler();
