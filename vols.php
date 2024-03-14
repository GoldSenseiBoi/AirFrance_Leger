<?php
// Inclure le fichier de configuration de la base de données
require_once 'config/database.php';

// Vérifier si le paramètre destination_id est passé dans l'URL
if (isset($_GET['destination_id'])) {
    $destination_id = $_GET['destination_id'];

    // Récupérer les vols pour la destination spécifiée depuis la base de données
    $query = "SELECT * FROM Vol WHERE Destination_depart = :destination_id OR Destination_arrivee = :destination_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':destination_id', $destination_id);
    $stmt->execute();
    $vols = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les vols
    foreach ($vols as $vol) {
        echo '<p>Vol ' . $vol['Numero_de_vol'] . ' de ' . $vol['Date_depart'] . ' à ' . $vol['Date_arrivee'] . '</p>';
    }
} else {
    echo 'Erreur: ID de destination non spécifié.';
}
?>
