<?php

class ConnexionBD {
    private static $instance = null;

    private function __construct() {
       
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'airfrance2');

        try {
            $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance = $bdd;
        } catch(PDOException $e) {
            
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            exit;
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            new ConnexionBD();
        }
        return self::$instance;
    }
}

?>
