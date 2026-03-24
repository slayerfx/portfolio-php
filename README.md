# Portfolio PHP

Portfolio dynamique en PHP avec architecture MVC, gestion de projets via base de données et interface d'administration (CRUD).

## Technologies

- PHP 8
- MySQL
- Twig
- Composer
- phpdotenv

## Fonctionnalités

- Lister les projets
- Voir le détail d'un projet
- Ajouter, modifier, supprimer un projet
- Filtrer les projets par langage

## Installation

1. Cloner le dépôt
2. `composer install`
3. Créer un fichier `.env` à la racine avec les variables de connexion BDD :
   ```
   DB_HOST=localhost
   DB_NAME=portfolio
   DB_USER=root
   DB_PASS=
   ```
4. Importer le fichier `sql/create_database.sql` dans phpMyAdmin
5. Lancer le serveur PHP : `php -S localhost:8000`
