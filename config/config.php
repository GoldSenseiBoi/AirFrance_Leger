<?php
// Configuration de la base de données
define('DB_HOST', 'localhost'); // Hôte de la base de données
define('DB_USER', 'root'); // Nom d'utilisateur de la base de données
define('DB_PASSWORD', ''); // Mot de passe de la base de données
define('DB_NAME', 'airfrance'); // Nom de la base de données

// Autres configurations
// define('SITE_NAME', 'AirFrance');  Nom du site

/*
define('ROOT_PATH', dirname(__DIR__) . '/');
define('APP_PATH', ROOT_PATH . 'app/');
define('VIEWS_PATH', APP_PATH . 'Views/');
define('CONTROLLERS_PATH', APP_PATH . 'Controllers/');
define('MODELS_PATH', APP_PATH . 'Models/'); Définition des constantes pour les chemins */

// Connexion à la base de données avec PDO
try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    // Activer les exceptions PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // En cas d'échec de la connexion, afficher l'erreur
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
    exit;
}
?>
