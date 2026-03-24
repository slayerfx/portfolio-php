<?php

// Point d'entrée de l'application
require "vendor/autoload.php";

// Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Chargement des classes du projet
require "config/autoload.php";

// Lancement du routeur
$router = new Router();
$router->handleRequest();
