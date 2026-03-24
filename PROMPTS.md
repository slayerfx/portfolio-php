# Documentation des prompts IA - Portfolio PHP MVC

## Prompt 1 : Conception du projet

**IA utilisée :** Claude (Anthropic)

**Prompt :**
Pour mon projet portfolio il faudrait que je puisse visualiser mes projets avec show, ensuite show détail, description et le lien vers le code source et le dépôt GitHub. Je dois pouvoir aussi create, update, delete un projet. Il me faudrait aussi une base de données avec le nom du projet, la description, un lien vers ce projet. Il faudrait une route aussi pour ajouter, modifier ou supprimer depuis mon site. Peut-être mettre un système de filtre qui liste les projets en fonction du langage utilisé avec un findBy, et un findAll pour lister tous les projets. Peut-être utiliser Twig aussi.

**Réponse :**
L'IA a validé la conception et affiné les points suivants :
- Table project : id, name, description, source_link, github_link, language, created_at
- Routes : list_projects, show_project, create_project, check_create_project, update_project, check_update_project, delete_project, filter_projects
- Structure MVC : index.php, services/Router.php, controllers/ProjectController.php, managers/ProjectManager.php, models/Project.php, templates/ (Twig)
- Manager : findAll(), findById(), findByLanguage(), create(), update(), delete()
- Utilisation de Twig pour les templates et .env pour la connexion BDD

---

## Prompt 2 : Génération du code

**IA utilisée :** Claude (Anthropic)

**Prompt :**
On peut commencer à coder. L'IA a d'abord analysé la structure MVC existante du projet League (vu en cours) pour rester cohérent avec les conventions apprises, puis a généré l'ensemble des fichiers du projet.

**Réponse :**
L'IA a généré tous les fichiers du projet en suivant la structure MVC du cours :
- index.php : point d'entrée avec chargement de dotenv et autoload
- config/autoload.php : chargement de toutes les classes
- services/Router.php : aiguillage des routes vers ProjectController
- models/Project.php : modèle avec constructeur et getters
- managers/AbstractManager.php : connexion PDO à la BDD
- managers/ProjectManager.php : toutes les requêtes SQL (CRUD + filtre)
- controllers/AbstractController.php : initialisation de Twig, méthodes render() et redirect()
- controllers/ProjectController.php : toutes les actions (list, show, create, update, delete, filter)
- templates/ : layout Twig + templates pour chaque vue
- assets/css/style.css : mise en page de base
- sql/create_database.sql : script de création de la table
- .env, .gitignore, composer.json
