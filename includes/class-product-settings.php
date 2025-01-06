<?php
class Custom_Product_Settings {
    public function __construct() {
        add_action( 'woocommerce_product_options_general_product_data', array( $this, 'add_custom_field' ) );
        add_action( 'woocommerce_process_product_meta', array( $this, 'save_custom_field' ) );
    }

    // Ajouter une case à cocher dans l'édition de produit
    public function add_custom_field() {
        woocommerce_wp_checkbox( array(
            'id'          => '_enable_custom_input',
            'label'       => 'Activer l’input personnalisé',
            'description' => 'Cochez pour afficher un champ texte personnalisé pour ce produit.',
        ));
    }

    // Sauvegarder la valeur de la case à cocher
    public function save_custom_field( $post_id ) {
        $is_checked = isset( $_POST['_enable_custom_input'] ) ? 'yes' : 'no';
        update_post_meta( $post_id, '_enable_custom_input', $is_checked );
    }
}

new Custom_Product_Settings();
