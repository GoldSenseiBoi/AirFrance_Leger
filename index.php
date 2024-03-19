<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des destinations</title>
    <!-- Ajoutez ici les liens vers les feuilles de style Bootstrap ou vos propres styles -->
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/AF.jpg" alt="Logo" width="55" height="40" class="d-inline-block align-text-top">
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
        <div class="ms-auto d-flex align-items-center">
                <a href="connexion.php" class="btn btn-primary me-2">Connexion</a>
                <a href="inscription.php" class="btn btn-primary me-2">Inscription</a>
                <a href="#" class="btn btn-primary">Connecter en tant qu'Admin</a>
        </div>
        <br />
        <br />
        <div class="titre2">
            <h2 style="">Bienvenue sur le site de Air France.</h2>
        </div>
        <br />
        <br />
        <br />
        <div class="titre1">
            <h1>Nos destinations</h1>
        </div>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
