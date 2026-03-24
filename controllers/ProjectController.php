<?php

// Controller qui gère toutes les actions liées aux projets
class ProjectController extends AbstractController {
    private ProjectManager $pm;

    public function __construct() {
        parent::__construct();
        $this->pm = new ProjectManager();
    }

    // Liste tous les projets
    public function list(): void {
        $projects = $this->pm->findAll();
        $languages = $this->pm->findAllLanguages();
        $this->render("projects/list", [
            "projects" => $projects,
            "languages" => $languages
        ]);
    }

    // Affiche le détail d'un projet
    public function show(int $id): void {
        $project = $this->pm->findById($id);
        if (!$project) {
            $this->redirect("index.php");
            return;
        }
        $this->render("projects/show", ["project" => $project]);
    }

    // Affiche le formulaire de création
    public function create(): void {
        $this->render("projects/create");
    }

    // Traite le formulaire de création
    public function checkCreate(): void {
        // Vérification que les champs obligatoires sont remplis
        if (empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["language"])) {
            $this->redirect("index.php?route=create_project");
            return;
        }

        // Création du projet avec les données du formulaire
        $project = new Project(
            htmlspecialchars($_POST["name"]),
            htmlspecialchars($_POST["description"]),
            htmlspecialchars($_POST["language"]),
            htmlspecialchars($_POST["source_link"] ?? ""),
            htmlspecialchars($_POST["github_link"] ?? "")
        );

        $this->pm->create($project);
        $this->redirect("index.php");
    }

    // Affiche le formulaire de modification
    public function update(int $id): void {
        $project = $this->pm->findById($id);
        if (!$project) {
            $this->redirect("index.php");
            return;
        }
        $this->render("projects/update", ["project" => $project]);
    }

    // Traite le formulaire de modification
    public function checkUpdate(): void {
        if (empty($_POST["id"]) || empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["language"])) {
            $this->redirect("index.php");
            return;
        }

        $project = new Project(
            htmlspecialchars($_POST["name"]),
            htmlspecialchars($_POST["description"]),
            htmlspecialchars($_POST["language"]),
            htmlspecialchars($_POST["source_link"] ?? ""),
            htmlspecialchars($_POST["github_link"] ?? ""),
            null,
            (int)$_POST["id"]
        );

        $this->pm->update($project);
        $this->redirect("index.php?route=show_project&id=" . $project->getId());
    }

    // Supprime un projet
    public function delete(int $id): void {
        $this->pm->delete($id);
        $this->redirect("index.php");
    }

    // Filtre les projets par langage
    public function filter(string $language): void {
        $projects = $this->pm->findByLanguage($language);
        $languages = $this->pm->findAllLanguages();
        $this->render("projects/list", [
            "projects" => $projects,
            "languages" => $languages,
            "currentLanguage" => $language
        ]);
    }
}
