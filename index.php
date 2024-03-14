<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des destinations</title>
    <!-- Ajoutez ici les liens vers les feuilles de style Bootstrap ou vos propres styles -->
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
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
            echo '<div class="card" style="width: 18rem; margin: 20px;">';
            echo '<img style="width: 287px;height: 190px;" src="' . $destination['Image'] . '" class="card-img-top" alt="' . $destination['Nom_ville'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $destination['Nom_ville'] . '</h5>';
            echo '<a href="vols.php?destination_id=' . $destination['ID_Destination'] . '" class="btn btn-primary">Voir les vols</a>';
            echo '</div>'; // Fermeture de card-body
            echo '</div>'; // Fermeture de card
        }
        ?>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

