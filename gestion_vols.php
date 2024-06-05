<h2> Gestion des vols </h2><br /><br />

<?php
// Inclure les classes nécessaires
require_once 'modele/modele.class.php';
require_once 'controleur/controleur.class.php';


// Créer une instance du contrôleur
$controleur = new Controleur();

// Initialiser la variable $leVol à null
// Vérification des actions sur les vols
$leVol = null;

$lesAeroports = $unControleur->selectAllAeroports();
$lesAvions = $unControleur->selectAllAvions();

if (isset($_GET['action']) && isset($_GET['idvol'])) {
    $idVol = $_GET['idvol'];
    $action = $_GET['action'];

    switch ($action) {
        case "sup":
            $unControleur->deleteVol($idVol);
            break;
        case "edit":
            $leVol = $unControleur->selectWhereVol($idVol);
            break;
        case "voir":
            $detailsVol = $unControleur->selectWhereVol($idVol);
            break;
    }
}

// Inclusion de la vue pour insérer un vol
require_once("vue/vue_insert_vols.php");

// Insertion d'un nouveau vol
if (isset($_POST['Valider'])) {
    if ($_POST['AeroportDepart'] !== $_POST['AeroportArrivee']) {
        $unControleur->insertVol($_POST);
    } else {
        echo "L'aéroport de départ et l'aéroport d'arrivée doivent être différents.";
    }
}

// Mise à jour d'un vol
if (isset($_POST['Modifier'])) {
    if ($_POST['AeroportDepart'] !== $_POST['AeroportArrivee']) {
        $unControleur->updateVol($_POST);
        echo '
        <script language="javascript">
         window.location.href="index.php?page=4" ;
         </script>'; 
    } else {
        echo "L'aéroport de départ et l'aéroport d'arrivée doivent être différents.";
    }
}

if (isset($_POST['Annuler'])) {
    $lAeroport = null;
    echo '
        <script language="javascript">window.location.href="index.php?page=4" ;
    </script>';

    

        

        
}

// Filtrage des vols
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
    $lesVols = $unControleur->selectLikeVol($filtre);
} else {
    $lesVols = $unControleur->selectAllVols();
}

// Affichage du nombre de vols
$nbVols = $unControleur->count("vols")['nb'];
echo "<br> Nombre de vols : " . $nbVols;

// Inclusion de la vue pour afficher la liste des vols
require_once("vue/vue_select_vols.php");

// Affichage des détails du vol si disponible

?>
