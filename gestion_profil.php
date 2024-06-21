<!-- gestion_profil.php -->
<h2>Gestion de profil</h2>
<?php
require_once 'modele/modele.class.php';
require_once 'controleur/controleur.class.php';

$controleur = new Controleur();

if (isset($_POST['modifierProfil'])) {
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : null;
    $confirm_mdp = !empty($_POST['confirm_mdp']) ? $_POST['confirm_mdp'] : null;

    if ($mdp === $confirm_mdp) {
        $controleur->updateProfil($email, $prenom, $mdp);
        echo "Profil mis à jour avec succès.";
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}

require_once("vue/vue_gestion_profil.php");
?>
