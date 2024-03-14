<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des destinations</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div>
        <h1>Liste des destinations</h1>
        
        
            <div class="destination-container">
                <?php
                // Inclure le fichier de configuration de la base de données
                require_once 'config/database.php';

                // Récupérer la liste des destinations depuis la base de données
                $query = "SELECT * FROM Destination";
                $stmt = $db->query($query);
                $destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Afficher chaque destination sous forme de card

                foreach ($destinations as $destination) {
                    echo '<div class="card">';
                    echo '<img style="width: 150px;height: 150px;" src="' . $destination['Image'] . '" alt="' . $destination['Nom_ville'] . '">';
                    echo '<div class="card-info">';
                    echo '<h2>' . $destination['Nom_ville'] . '</h2>';
                    echo '<a href="vols.php?destination_id=' . $destination['ID_Destination'] . '">Voir les vols</a>';
                    echo '</div>'; // Fermeture de card-info
                    echo '</div>'; // Fermeture de card
                }
                ?>
            </div>
        
    </div>
</body>
</html>
