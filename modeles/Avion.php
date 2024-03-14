<?php
class Avion {
    // Méthode pour récupérer la liste des avions depuis la base de données
    public static function getAll() {
        require_once 'config/database.php';

        try {
            $query = "SELECT * FROM Avion";
            $stmt = $db->query($query);
            $avions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $avions;
        } catch(PDOException $e) {
            echo "Erreur lors de la récupération des avions: " . $e->getMessage();
            exit;
        }
    }
}
?>
