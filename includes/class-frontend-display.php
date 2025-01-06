<?php
class Custom_Product_Frontend_Display
{
    public function __construct()
    {
        add_filter('woocommerce_checkout_fields', array($this, 'add_custom_checkout_field'));
        add_action('woocommerce_checkout_create_order_line_item', array($this, 'save_custom_message_to_order'), 10, 4);
        add_action('woocommerce_after_order_itemmeta', array($this, 'display_custom_message_in_order_items'), 10, 3);

        // Masquer les métadonnées "Message personnalisé"
        add_filter('woocommerce_hidden_order_itemmeta', function ($hidden_meta) {
            $hidden_meta[] = 'Message personnalisé';
            return $hidden_meta;
        });

        add_filter('woocommerce_order_item_get_formatted_meta_data', function ($formatted_meta, $item) {
            if (is_a($item, 'WC_Order_Item_Product')) { // Vérifie si c'est bien un produit
                $product_id = $item->get_product_id();

                foreach ($formatted_meta as $key => $meta) {
                    // Supprime les métadonnées "Message personnalisé" si le produit n'a pas activé l'input
                    if ($meta->key === 'Message personnalisé' && get_post_meta($product_id, '_enable_custom_input', true) !== 'yes') {
                        unset($formatted_meta[$key]);
                    }
                }
            }
            return $formatted_meta;
        }, 10, 2);
    }

    public function add_custom_checkout_field($fields)
    {
        foreach (WC()->cart->get_cart() as $cart_item) {
            $product_id = $cart_item['product_id'];
            if (get_post_meta($product_id, '_enable_custom_input', true) === 'yes') {
                $fields['order']['custom_message_' . $product_id] = array(
                    'type'        => 'textarea',
                    'label'       => 'Message personnalisé pour ' . get_the_title($product_id),
                    'required'    => true,
                    'class'       => array('form-row-wide'),
                );
            }
        }
        return $fields;
    }

    public function save_custom_message_to_order($item, $cart_item_key, $values, $order)
    {
        foreach (WC()->cart->get_cart() as $cart_item) {
            $product_id = $cart_item['product_id'];
            if (isset($_POST['custom_message_' . $product_id])) {
                $item->add_meta_data('Message personnalisé', sanitize_text_field(stripslashes($_POST['custom_message_' . $product_id])));
            }
        }
    }

    public function display_custom_message_in_order_items($item_id, $item, $order)
    {
        // Vérifie si l'élément est bien un produit
        if (is_a($item, 'WC_Order_Item_Product')) {
            $product_id = $item->get_product_id();

            // Vérifie si le produit a activé l'input personnalisé
            if (get_post_meta($product_id, '_enable_custom_input', true) === 'yes') {
                $custom_message = wc_get_order_item_meta($item_id, 'Message personnalisé');
                if ($custom_message) {
                    echo '<p><strong>Message personnalisé :</strong> ' . esc_html($custom_message) . '</p>';
                }
            }
        }
    }
}




new Custom_Product_Frontend_Display();
