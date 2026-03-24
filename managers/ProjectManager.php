<?php

// Manager qui gère les requêtes SQL pour les projets
class ProjectManager extends AbstractManager {
    public function __construct() {
        parent::__construct();
    }

    // Récupère tous les projets
    public function findAll(): array {
        $query = $this->db->prepare("SELECT * FROM project ORDER BY created_at DESC");
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $projects = [];
        foreach ($results as $result) {
            $projects[] = new Project(
                $result["name"],
                $result["description"],
                $result["language"],
                $result["source_link"],
                $result["github_link"],
                $result["created_at"],
                $result["id"]
            );
        }
        return $projects;
    }

    // Récupère un projet par son id
    public function findById(int $id): ?Project {
        $query = $this->db->prepare("SELECT * FROM project WHERE id = :id");
        $query->execute(["id" => $id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return new Project(
            $result["name"],
            $result["description"],
            $result["language"],
            $result["source_link"],
            $result["github_link"],
            $result["created_at"],
            $result["id"]
        );
    }

    // Récupère les projets filtrés par langage
    public function findByLanguage(string $language): array {
        $query = $this->db->prepare("SELECT * FROM project WHERE language = :language ORDER BY created_at DESC");
        $query->execute(["language" => $language]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $projects = [];
        foreach ($results as $result) {
            $projects[] = new Project(
                $result["name"],
                $result["description"],
                $result["language"],
                $result["source_link"],
                $result["github_link"],
                $result["created_at"],
                $result["id"]
            );
        }
        return $projects;
    }

    // Récupère la liste des langages distincts
    public function findAllLanguages(): array {
        $query = $this->db->prepare("SELECT DISTINCT language FROM project ORDER BY language");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

    // Crée un nouveau projet
    public function create(Project $project): void {
        $query = $this->db->prepare(
            "INSERT INTO project (name, description, language, source_link, github_link)
             VALUES (:name, :description, :language, :source_link, :github_link)"
        );
        $query->execute([
            "name" => $project->getName(),
            "description" => $project->getDescription(),
            "language" => $project->getLanguage(),
            "source_link" => $project->getSourceLink(),
            "github_link" => $project->getGithubLink()
        ]);
    }

    // Met à jour un projet existant
    public function update(Project $project): void {
        $query = $this->db->prepare(
            "UPDATE project SET name = :name, description = :description, language = :language,
             source_link = :source_link, github_link = :github_link WHERE id = :id"
        );
        $query->execute([
            "name" => $project->getName(),
            "description" => $project->getDescription(),
            "language" => $project->getLanguage(),
            "source_link" => $project->getSourceLink(),
            "github_link" => $project->getGithubLink(),
            "id" => $project->getId()
        ]);
    }

    // Supprime un projet par son id
    public function delete(int $id): void {
        $query = $this->db->prepare("DELETE FROM project WHERE id = :id");
        $query->execute(["id" => $id]);
    }
}
