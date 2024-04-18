<h2> Gestion des aéroports </h2>

<?php

// Vérification du rôle de l'utilisateur

	$lAeroport = null;
    // Vérification des actions sur les aéroports
    if(isset($_GET['action']) && isset($_GET['idAeroport'])){
        $idAeroport = $_GET['idAeroport']; 
        $action = $_GET['action']; 

        switch ($action){
            case "sup" : 
                // Appel de la fonction pour supprimer un aéroport
                $lAeroport = $unControleur->deleteAeroport($idAeroport); 
                
                break; 
            case "edit" : 
                // Sélection d'un aéroport pour édition
                $lAeroport = $unControleur->selectWhereAeroport($idAeroport);  
                break;
            case "voir" :
                // Affichage des détails de l'aéroport
                $detailsAeroport = $unControleur->selectWhereAeroport($idAeroport);
                break;  
        }
    }

    // Inclusion du formulaire d'insertion d'aéroport
    require_once ("vue/vue_insert_aeroport.php"); 

    // Traitement de l'insertion d'un nouvel aéroport
    if(isset($_POST['Valider'])){
        //$unControleur->insertAeroport($_POST);

        // Appel de la procédure stockée 
        $nomP = "insertAeroport"; 
        $tab = array($_POST['Nom'], $_POST['Localisation']);
        $unControleur->appelProcedure($nomP, $tab);
    }

    // Traitement de la modification d'un aéroport
    if (isset($_POST['Modifier'])){
        $unControleur->updateAeroport($_POST); 
        header("Location: index.php?page=2");
    }

 //fin if admin

// Filtrage des aéroports
if(isset($_POST['Filtrer'])){
    $filtre = $_POST['filtre']; 
    $lesAeroports = $unControleur->selectLikeAeroport($filtre); 
} else {
    $lesAeroports = $unControleur->selectAllAeroports();
}

// Affichage du nombre d'aéroports
$nb = $unControleur->count("aeroports")['nb']; 
echo "<br> Nombre d'aéroports : ".$nb; 

// Inclusion de la vue pour afficher la liste des aéroports
require_once("vue/vue_select_aeroports.php");

// Affichage des détails de l'aéroport si disponible

?>
