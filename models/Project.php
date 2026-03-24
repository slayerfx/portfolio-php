<?php

// Modèle représentant un projet du portfolio
class Project {
    public function __construct(
        private string $name,
        private string $description,
        private string $language,
        private ?string $sourceLink = null,
        private ?string $githubLink = null,
        private ?string $createdAt = null,
        private ?int $id = null
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getLanguage(): string {
        return $this->language;
    }

    public function getSourceLink(): ?string {
        return $this->sourceLink;
    }

    public function getGithubLink(): ?string {
        return $this->githubLink;
    }

    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    public function getId(): ?int {
        return $this->id;
    }
}
