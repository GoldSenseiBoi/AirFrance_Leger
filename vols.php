<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des vols</title>
    <!-- Ajoutez ici les liens vers les feuilles de style Bootstrap ou vos propres styles -->
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                    <img src="images/AF.jpg"  alt="Logo" width="55" height="40" class="d-inline-block align-text-top">
                    <h4>Air France</h4>
                    </a>
                    <!-- Ajouter le formulaire de recherche -->
                    <form class="d-flex" action="recherche.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Rechercher une destination" aria-label="Search" name="q">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                </div>
    </nav>
    <div class="container">
        <h1>Liste des vols</h1>
        <div class="vols-container">
            <?php
            // Vérifier si le paramètre de destination_id est passé dans l'URL
            if (isset($_GET['destination_id'])) {
                $destination_id = $_GET['destination_id'];

                // Inclure le fichier de configuration de la base de données
                require_once 'config/database.php';

                // Requête SQL pour récupérer les informations sur les vols et les aéroports correspondants
                $query = "SELECT v.Numero_de_vol, v.Date_depart, v.Date_arrivee, aeroport_depart.Nom AS aeroport_depart_nom, aeroport_arrivee.Nom AS aeroport_arrivee_nom
                          FROM Vol v
                          INNER JOIN Aeroport aeroport_depart ON v.Aeroport_depart = aeroport_depart.ID_Aeroport
                          INNER JOIN Aeroport aeroport_arrivee ON v.Aeroport_arrivee = aeroport_arrivee.ID_Aeroport
                          WHERE (v.Destination_depart = :destination_id OR v.Destination_arrivee = :destination_id) AND v.Destination_arrivee = :destination_id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':destination_id', $destination_id);
                $stmt->execute();
                $vols = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Afficher les vols
                foreach ($vols as $vol) {
                    echo '<div class="card" style="width: 18rem; margin: 20px;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Vol ' . $vol['Numero_de_vol'] . '</h5>';
                    echo '<p class="card-text">Départ: ' . $vol['Date_depart'] . ' - Aéroport: ' . $vol['aeroport_depart_nom'] . '</p>';
                    echo '<p class="card-text">Arrivée: ' . $vol['Date_arrivee'] . ' - Aéroport: ' . $vol['aeroport_arrivee_nom'] . '</p>';
                    echo '<a href="#" class="btn btn-primary">Réserver</a>';
                    echo '</div>'; // Fermeture de card-body
                    echo '</div>'; // Fermeture de card
                }

                // Si aucun vol n'est trouvé
                if (count($vols) == 0) {
                    echo '<p>Aucun vol trouvé pour cette destination.</p>';
                }
            } else {
                echo '<p>Erreur: Aucune destination spécifiée.</p>';
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
