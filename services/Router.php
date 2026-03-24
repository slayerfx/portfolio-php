<?php

// Le routeur dirige les requêtes vers le bon controller et la bonne méthode
class Router {
    public function handleRequest(): void {
        $route = isset($_GET["route"]) ? $_GET["route"] : "list_projects";

        // Instanciation du controller
        $ctrl = new ProjectController();

        // Aiguillage selon la route
        if ($route === "show_project" && isset($_GET["id"])) {
            $ctrl->show((int)$_GET["id"]);
        } elseif ($route === "create_project") {
            $ctrl->create();
        } elseif ($route === "check_create_project") {
            $ctrl->checkCreate();
        } elseif ($route === "update_project" && isset($_GET["id"])) {
            $ctrl->update((int)$_GET["id"]);
        } elseif ($route === "check_update_project") {
            $ctrl->checkUpdate();
        } elseif ($route === "delete_project" && isset($_GET["id"])) {
            $ctrl->delete((int)$_GET["id"]);
        } elseif ($route === "filter_projects" && isset($_GET["language"])) {
            $ctrl->filter($_GET["language"]);
        } elseif ($route === "add_favorite" && isset($_GET["id"])) {
            $ctrl->addFavorite((int)$_GET["id"]);
        } elseif ($route === "remove_favorite" && isset($_GET["id"])) {
            $ctrl->removeFavorite((int)$_GET["id"]);
        } elseif ($route === "list_favorites") {
            $ctrl->listFavorites();
        } else {
            $ctrl->list();
        }
    }
}
