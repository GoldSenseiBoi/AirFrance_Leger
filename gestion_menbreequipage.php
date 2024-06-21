<!-- gestion_menbreequipage.php -->
<h2>Gestion des membres de l'équipage</h2>
<?php
require_once 'modele/modele.class.php';
require_once 'controleur/controleur.class.php';

$controleur = new Controleur();

$lMembre = null;
$lesVols = $controleur->selectAllVols();

if (isset($_GET['action']) && isset($_GET['idmembreequipage'])) {
    $idMembreEquipage = $_GET['idmembreequipage'];
    $action = $_GET['action'];

    switch ($action) {
        case "sup":
            $controleur->deleteMembreEquipage($idMembreEquipage);
            break;
        case "edit":
            $lMembre = $controleur->selectWhereMembreEquipage($idMembreEquipage);
            break;
        case "voir":
            $detailsMembreEquipage = $controleur->selectWhereMembreEquipage($idMembreEquipage);
            break;
    }
}

// Inclusion de la vue pour insérer un membre d'équipage
require_once("vue/vue_insert_membreequipage.php");

// Insertion d'un nouveau membre d'équipage
if (isset($_POST['Valider'])) {
    $controleur->insertMembresEquipage($_POST);
    echo "Membre d'équipage ajouté avec succès.";
}

// Mise à jour d'un membre d'équipage
if (isset($_POST['Modifier'])) {
    $controleur->updateMembreEquipage($_POST);
    echo '
    <script language="javascript">
    window.location.href="index.php?page=7";
    </script>';
}

if (isset($_POST['Annuler'])) {
    $lMembre = null;
    echo '
    <script language="javascript">
    window.location.href="index.php?page=7";
    </script>';
}

// Filtrage et tri des membres d'équipage
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
    $lesMembresEquipage = $controleur->selectLikeMembresEquipage($champ, $filtre);
} else {
    $lesMembresEquipage = $controleur->selectAllMembresEquipage($order);
}

// Affichage du nombre de membres d'équipage
$nbMembresEquipage = $controleur->count("membresequipage")['nb'];
echo "<br> Nombre de membres d'équipage : " . $nbMembresEquipage;

// Inclusion de la vue pour afficher la liste des membres d'équipage
require_once("vue/vue_select_membreequipage.php");
?>
