<h2> Gestion des vols </h2><br /><br />

<?php
// Inclure les classes nécessaires
require_once 'modele/modele.class.php';
require_once 'controleur/controleur.class.php';


// Créer une instance du contrôleur
$controleur = new Controleur();

// Initialiser la variable $leVol à null
$leVol = null;

// Vérification des actions sur les vols
$lesAeroports = $controleur->selectAllAeroports();
$lesAvions = $controleur->selectAllAvions();

if (isset($_GET['action']) && isset($_GET['idvol'])) {
    $idVol = $_GET['idvol'];
    $action = $_GET['action'];

    switch ($action) {
        case "sup":
            $controleur->deleteVol($idVol);
            header("Location: index.php?page=4");
            exit();
            break;
        case "edit":
            $leVol = $controleur->selectWhereVol($idVol);
            break;
        case "voir":
            $detailsVol = $controleur->selectWhereVol($idVol);
            break;
    }
}

// Inclusion de la vue pour insérer un vol
require_once "vue/vue_insert_vols.php";

// Insertion d'un nouveau vol
if (isset($_POST['Valider'])) {
    $controleur->insertVol($_POST);
    header("Location: index.php?page=4");
    exit();
}

// Mise à jour d'un vol
if (isset($_POST['Modifier'])) {
    $controleur->updateVol($_POST);
    echo '
    <script language="javascript">
     window.location.href="index.php?page=4" ;
     </script>'; 
    exit();
}

// Annulation
if (isset($_POST['Annuler'])) {
    header("Location: index.php?page=4");
    exit();
}

// Filtrage des vols
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtre'];
    $lesVols = $controleur->selectLikeVol($filtre);
} else {
    $lesVols = $controleur->selectAllVols();
}

// Affichage du nombre de vols
$nbVols = $controleur->count("vols")['nb'];
echo "<br> Nombre de vols : " . $nbVols;

// Inclusion de la vue pour afficher la liste des vols
require_once "vue/vue_select_vols.php";
?>
