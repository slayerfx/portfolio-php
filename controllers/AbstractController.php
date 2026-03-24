<?php

// Controller abstrait qui initialise Twig et fournit les méthodes render et redirect
abstract class AbstractController {
    private \Twig\Environment $twig;

    public function __construct() {
        // Configuration de Twig : on indique le dossier des templates
        $loader = new \Twig\Loader\FilesystemLoader("templates");
        $this->twig = new \Twig\Environment($loader);
    }

    // Affiche un template Twig avec les données passées en paramètre
    // On passe aussi les favoris de la session pour les rendre disponibles dans tous les templates
    protected function render(string $template, array $data = []): void {
        $data["favorites"] = $_SESSION["favorites"] ?? [];
        echo $this->twig->render($template . ".html.twig", $data);
    }

    // Redirige vers une route
    protected function redirect(string $route): void {
        header("Location: $route");
        exit;
    }
}
