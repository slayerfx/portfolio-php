<?php

// Classe abstraite qui gère la connexion à la base de données
abstract class AbstractManager {
    protected PDO $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"] . ";charset=utf8",
            $_ENV["DB_USER"],
            $_ENV["DB_PASS"]
        );
    }
}
