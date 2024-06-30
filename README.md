# Projet-Design-Pattern

## Commandes Utiles

- Exécution des tests unitaires :
    vendor/bin/phpunit

- Lancer le serveur web local :
    php -S localhost:8000 -t public

## Design Patterns Utilisés

### Template Method Pattern

- **Feature** : Gestion des transactions
- **Classes** : `AbstractTransaction`, `AbstractPayment`

### Strategy Pattern

- **Feature** : Méthodes de paiement interchangeables
- **Classes** : `PaymentInterface`, `StripePayment`

### Factory Pattern

- **Feature** : Création d'instances de méthodes de paiement
- **Classes** : `PaymentFactory`
