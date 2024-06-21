<!-- gestion_reservation.php -->
<h2>Gestion des réservations</h2>
<?php
require_once 'modele/modele.class.php';
require_once 'controleur/controleur.class.php';

$controleur = new Controleur();

$lesPassagers = $controleur->selectAllPassagers();
$lesVols = $controleur->selectAllVols();
$lReservation = null;

if (isset($_GET['action']) && isset($_GET['idreservation'])) {
    $idReservation = $_GET['idreservation'];
    $action = $_GET['action'];

    switch ($action) {
        case "sup":
            $controleur->deleteReservation($idReservation);
            break;
        case "edit":
            $lReservation = $controleur->selectWhereReservation($idReservation);
            break;
        case "voir":
            $detailsReservation = $controleur->selectWhereReservation($idReservation);
            break;
    }
}

// Inclusion de la vue pour insérer une réservation
require_once("vue/vue_insert_reservation.php");

// Insertion d'une nouvelle réservation
if (isset($_POST['Valider'])) {
    if ($controleur->verifDateReservation($_POST['ID_Vol'], $_POST['DateReservation'])) {
        $controleur->insertReservation($_POST);
        echo "Réservation effectuée avec succès.";
    } else {
        echo "<br>La date de réservation doit être antérieure ou égale à la date de départ.";
    }
}

// Mise à jour d'une réservation
if (isset($_POST['Modifier'])) {
    if ($controleur->verifDateReservation($_POST['ID_Vol'], $_POST['DateReservation'])) {
        $controleur->updateReservation($_POST);
        echo '
        <script language="javascript">
        window.location.href="index.php?page=5";
        </script>';
    } else {
        echo "<br>La date de réservation doit être antérieure ou égale à la date de départ.";
    }
}

if (isset($_POST['Annuler'])) {
    $lReservation = null;
    echo '
    <script language="javascript">
    window.location.href="index.php?page=5";
    </script>';
}

// Filtrage et tri des réservations
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
    $lesReservations = $controleur->selectLikeReservation($champ, $filtre);
} else {
    $lesReservations = $controleur->selectAllReservations($order);
}

// Affichage du nombre de réservations
$nbReservations = $controleur->count("reservations")['nb'];
echo "<br> Nombre de réservations : " . $nbReservations;

// Inclusion de la vue pour afficher la liste des réservations
require_once("vue/vue_select_reservation.php");

// Affichage des détails de la réservation si disponible

?>
