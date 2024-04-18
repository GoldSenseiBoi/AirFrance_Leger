<h2> Gestion des passagers </h2>

<?php

// Vérification des actions sur les passagers
$passager = null;
if(isset($_GET['action']) && isset($_GET['idPassager'])){
    $idPassager = $_GET['idPassager']; 
    $action = $_GET['action']; 

    switch ($action){
        case "sup" : 
            $unControleur->deletePassager($idPassager); 
            break; 
        case "edit" : 
            $passager = $unControleur->selectWherePassager($idPassager);  
            break;
        case "voir" :
            $detailsPassager = $unControleur->selectWherePassager($idPassager);
            break;  
    }
}

// Inclusion de la vue pour insérer un passager
require_once ("vue/vue_insert_passager.php"); 

// Insertion d'un nouveau passager
if(isset($_POST['Valider'])){
    $unControleur->insertPassagers($_POST);
}

// Mise à jour d'un passager
if (isset($_POST['Modifier'])){
    $unControleur->updatePassager($_POST); 
    header("Location: index.php?page=2");
}

// Filtrage des passagers
if(isset($_POST['Filtrer'])){
    $filtre = $_POST['filtre']; 
    $lesPassagers = $unControleur->selectLikePassager($filtre); 
} else {
    $lesPassagers = $unControleur->selectAllPassagers();
}

// Affichage du nombre de passagers
$nbPassagers = $unControleur->count("passagers")['nb']; 
echo "<br> Nombre de passagers : ".$nbPassagers; 

// Inclusion de la vue pour afficher la liste des passagers
require_once("vue/vue_select_passagers.php");

// Affichage des détails du passager si disponible

?>
