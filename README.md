# Custom Cart Message for WooCommerce

**Version :** 2.0  
**Auteur :** Mathis Petit  
**Description :** Ajoutez un champ de message personnalisé pour les produits spécifiques dans le panier WooCommerce. Ce plugin est idéal pour des options telles que des cartes messages ou d'autres personnalisations liées aux produits.

---

## Fonctionnalités

- Ajouter un champ de message personnalisé (textarea) lors de la commande.
- Gérer l'activation/désactivation de l'input pour chaque produit individuellement depuis la page d'édition produit.
- Afficher le message personnalisé dans :
  - Le récapitulatif de la commande.
  - Les emails de confirmation de commande.
  - Les détails de la commande dans WooCommerce.
- Masquer automatiquement les métadonnées non pertinentes dans WooCommerce.
- Possibilité d'ajouter du CSS pour styliser l'input et le label.

---

## Installation

1. Téléchargez le dossier du plugin.
2. Accédez à **Extensions → Ajouter** dans votre tableau de bord WordPress.
3. Cliquez sur **Téléverser une extension**, choisissez le fichier ZIP du plugin, puis cliquez sur **Installer maintenant**.
4. Activez le plugin.

---

## Utilisation

### Configuration d'un produit pour activer l'input

1. Accédez à un produit WooCommerce dans le back-office.
2. Dans la section **Données produit**, vous trouverez une nouvelle option intitulée **Activer l'input personnalisé**.
3. Cochez cette case pour activer le champ de message personnalisé pour ce produit.
4. Enregistrez les modifications.

### Affichage du champ personnalisé

- Lorsqu'un produit avec l'option activée est ajouté au panier, le champ de message personnalisé s'affiche dans la page de commande.
- Le champ est obligatoire et doit être rempli pour passer la commande.

### Visualisation du message

- Le message personnalisé est visible dans :
  - Le récapitulatif de la commande.
  - Les détails de la commande dans WooCommerce.
  - Les emails envoyés au client et à l'administrateur.

---

## Personnalisation

### Ajouter votre propre style CSS

Pour styliser l'input, vous pouvez utiliser le fichier CSS inclus dans le plugin. Vous pouvez également ajouter votre propre CSS en modifiant le fichier suivant :  
`assets/style.css`.

---

# Dépendances

- WooCommerce 7.0 ou version ultérieure.
- WordPress 6.0 ou version ultérieure.

---

## Changelog

### Version 2.0

- **Nouveau :** Gestion de l'activation depuis la page produit via une case à cocher.
- **Nouveau :** Suppression des doublons de messages dans les commandes et emails.
- **Amélioration :** Code modulaire et extensible.
- **Amélioration :** Ajout de fichiers CSS personnalisables pour le style de l'input.

### Version 1.0

- Fonctionnalité de base pour ajouter un champ de message personnalisé à la commande.
- Affichage dans les détails de commande et les emails.

---

## Support

Pour toute question ou problème, vous pouvez contacter :  
**Mathis Petit** - [mathispetitfr@gmail.com](mailto:mathispetitfr@gmail.com)

