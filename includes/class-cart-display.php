<?php
class Custom_Product_Cart_Display {
    public function __construct() {
        add_action( 'woocommerce_after_cart_item_name', array( $this, 'add_note_for_custom_message_in_cart' ), 10, 2 );
    }

    // Afficher un message conditionnel sous le produit dans le panier
    public function add_note_for_custom_message_in_cart( $cart_item, $cart_item_key ) {
        // Vérifie si l'option "input personnalisé" est activée pour ce produit
        $product_id = $cart_item['product_id'];

        if ( get_post_meta( $product_id, '_enable_custom_input', true ) === 'yes' ) {
            echo '<p style="font-size: 0.9em; color: #666; margin-top: 5px;">';
            echo 'Pour personnaliser votre carte, vous pourrez saisir votre message après validation du panier.';
            echo '</p>';
        }
    }
}

// Initialiser la classe
new Custom_Product_Cart_Display();
