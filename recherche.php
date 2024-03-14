<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
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
        <h1>Résultats de la recherche</h1>
        <div class="destination-container">
            <?php
            // Inclure le fichier de configuration de la base de données
            require_once 'config/database.php';

            // Vérifier si le paramètre de recherche est passé dans l'URL
            if (isset($_GET['q'])) {
                $search_query = $_GET['q'];

                // Requête SQL pour rechercher les destinations correspondant à la requête de recherche
                $query = "SELECT * FROM Destination WHERE Nom_ville LIKE :search_query";
                $stmt = $db->prepare($query);
                $search_param = $search_query . '%'; // Ajouter un joker de pourcentage pour rechercher les correspondances commençant par le terme de recherche
                $stmt->bindParam(':search_query', $search_param);
                $stmt->execute();
                $destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Afficher les résultats de la recherche
                foreach ($destinations as $destination) {
                    echo '<div class="card" style="width: 18rem; margin: 20px;">';
                    echo '<img style="width: 287px;height: 190px;" src="' . $destination['Image'] . '" class="card-img-top" alt="' . $destination['Nom_ville'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $destination['Nom_ville'] . '</h5>';
                    echo '<a href="vols.php?destination_id=' . $destination['ID_Destination'] . '" class="btn btn-primary">Voir les vols</a>';
                    echo '</div>'; // Fermeture de card-body
                    echo '</div>'; // Fermeture de card
                }

                // Si aucun résultat n'est trouvé
                if (count($destinations) == 0) {
                    echo '<p>Aucun résultat trouvé.</p>';
                }
            } else {
                echo 'Erreur: Aucune requête de recherche spécifiée.';
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
