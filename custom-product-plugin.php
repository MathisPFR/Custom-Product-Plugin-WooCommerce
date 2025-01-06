<?php

/**
 * Plugin Name: Custom Cart Message for WooCommerce
 * Description: Ajoute un champ de message personnalisé pour les produits spécifiques dans WooCommerce.
 * Version: 2.0
 * Author: Mathis Petit - Agence Charlie   
 */

if (! defined('ABSPATH')) {
    exit; // Empêche l'accès direct
}

// Définir des constantes pour localiser les fichiers et assets
define('CUSTOM_PRODUCT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CUSTOM_PRODUCT_PLUGIN_URL', plugin_dir_url(__FILE__));

// Inclure les classes nécessaires
require_once CUSTOM_PRODUCT_PLUGIN_DIR . 'includes/class-product-settings.php';
require_once CUSTOM_PRODUCT_PLUGIN_DIR . 'includes/class-frontend-display.php';
require_once CUSTOM_PRODUCT_PLUGIN_DIR . 'includes/class-email-handler.php';
require_once CUSTOM_PRODUCT_PLUGIN_DIR . 'includes/class-cart-display.php';

// Charger les styles
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('custom-product-style', CUSTOM_PRODUCT_PLUGIN_URL . 'assets/style.css');
});
