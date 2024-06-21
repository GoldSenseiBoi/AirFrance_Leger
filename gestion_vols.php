<!-- gestion_vols.php -->
<h2>Gestion des vols</h2>
<?php
require_once 'modele/modele.class.php';
require_once 'controleur/controleur.class.php';

$controleur = new Controleur();

$lVol = null;

$lesAeroports = $controleur->selectAllAeroports();
$lesAvions = $controleur->selectAllAvions();

if (isset($_GET['action']) && isset($_GET['idvol'])) {
    $idVol = $_GET['idvol'];
    $action = $_GET['action'];

    switch ($action) {
        case "sup":
            $controleur->deleteVol($idVol);
            break;
        case "edit":
            $lVol = $controleur->selectWhereVol($idVol);
            break;
        case "voir":
            $detailsVol = $controleur->selectWhereVol($idVol);
            break;
    }
}

// Inclusion de la vue pour insérer un vol
require_once("vue/vue_insert_vols.php");

// Insertion d'un nouveau vol
if (isset($_POST['Valider'])) {
    if ($_POST['AeroportDepart'] !== $_POST['AeroportArrivee']) {
        $controleur->insertVol($_POST);
        echo "Vol ajouté avec succès.";
    } else {
        echo "L'aéroport de départ et l'aéroport d'arrivée doivent être différents.";
    }
}

// Mise à jour d'un vol
if (isset($_POST['Modifier'])) {
    if ($_POST['AeroportDepart'] !== $_POST['AeroportArrivee']) {
        $controleur->updateVol($_POST);
        echo '
        <script language="javascript">
        window.location.href="index.php?page=4";
        </script>';
    } else {
        echo "L'aéroport de départ et l'aéroport d'arrivée doivent être différents.";
    }
}

if (isset($_POST['Annuler'])) {
    $lVol = null;
    echo '
    <script language="javascript">
    window.location.href="index.php?page=4";
    </script>';
}

// Filtrage et tri des vols
$order = 'DESC';
if (isset($_POST['Trier'])) {
    if ($_POST['tri'] == 'recentes') {
        $order = 'DESC';
    } elseif ($_POST['tri'] == 'anciennes') {
        $order = 'ASC';
    }
}

if (isset($_POST['Filtrer'])) {
    $champ = $_POST['champ_filtre'];
    $filtre = $_POST['filtre'];
    $lesVols = $controleur->selectLikeVols($champ, $filtre);
} else {
    $lesVols = $controleur->selectAllVols($order);
}

// Affichage du nombre de vols
$nbVols = $controleur->count("vols")['nb'];
echo "<br> Nombre de vols : " . $nbVols;

// Inclusion de la vue pour afficher la liste des vols
require_once("vue/vue_select_vols.php");

// Affichage des détails du vol si disponible

?>
