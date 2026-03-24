<?php

require_once __DIR__ . "/../models/Project.php";

use PHPUnit\Framework\TestCase;

// Tests unitaires pour le modèle Project
class ProjectTest extends TestCase
{
    // Teste la création d'un projet avec tous les paramètres
    public function testCreateProject(): void
    {
        $project = new Project(
            "Mon Projet",
            "Description du projet",
            "PHP",
            "https://example.com",
            "https://github.com/test",
            "2026-03-24 12:00:00",
            1
        );

        $this->assertEquals("Mon Projet", $project->getName());
        $this->assertEquals("Description du projet", $project->getDescription());
        $this->assertEquals("PHP", $project->getLanguage());
        $this->assertEquals("https://example.com", $project->getSourceLink());
        $this->assertEquals("https://github.com/test", $project->getGithubLink());
        $this->assertEquals("2026-03-24 12:00:00", $project->getCreatedAt());
        $this->assertEquals(1, $project->getId());
    }

    // Teste que id et createdAt sont null par défaut
    public function testDefaultValues(): void
    {
        $project = new Project(
            "Mon Projet",
            "Description",
            "JavaScript",
            "https://example.com",
            "https://github.com/test"
        );

        $this->assertNull($project->getId());
        $this->assertNull($project->getCreatedAt());
    }

    // Teste que les getters retournent les bons types
    public function testGettersReturnTypes(): void
    {
        $project = new Project(
            "Test",
            "Desc",
            "HTML/CSS",
            "https://example.com",
            "https://github.com/test",
            "2026-03-24 12:00:00",
            5
        );

        $this->assertIsString($project->getName());
        $this->assertIsString($project->getDescription());
        $this->assertIsString($project->getLanguage());
        $this->assertIsInt($project->getId());
    }
}
