<h2> Gestion des vols </h2>

<?php

// Vérification des actions sur les vols
$leVol = null;

	$lesAeroports= $unControleur->selectAllAeroports (); //Permet d'avoir les aéroports dans le menu déroulant de insert
	$lesAvions= $unControleur->selectAllAvions ();

if(isset($_GET['action']) && isset($_GET['ID_Vol'])){
    $idVol = $_GET['ID_Vol']; 
    $action = $_GET['action']; 

    switch ($action){
        case "sup" : 
            $unControleur->deleteVol($idVol); 
            break; 
        case "edit" : 
            $leVol = $unControleur->selectWhereVol($idVol);  
            break;
        case "voir" :
            $detailsVol = $unControleur->selectWhereVol($idVol);
            break;  
    }
}

// Inclusion de la vue pour insérer un vol
require_once ("vue/vue_insert_vols.php"); 

// Insertion d'un nouveau vol
if(isset($_POST['Valider'])){
    $unControleur->insertVol($_POST);
}

// Mise à jour d'un vol
if (isset($_POST['Modifier'])){
    $unControleur->updateVol($_POST); 
    header("Location: index.php?page=2");
}

// Filtrage des vols
if(isset($_POST['Filtrer'])){
    $filtre = $_POST['filtre']; 
    $lesVols = $unControleur->selectLikeVol($filtre); 
} else {
    $lesVols = $unControleur->selectAllVols();
}

// Affichage du nombre de vols
$nbVols = $unControleur->count("vols")['nb']; 
echo "<br> Nombre de vols : ".$nbVols; 

// Inclusion de la vue pour afficher la liste des vols
require_once("vue/vue_select_vols.php");

// Affichage des détails du vol si disponible

?>
