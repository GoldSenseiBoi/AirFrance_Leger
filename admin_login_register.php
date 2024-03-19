<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once 'config/database.php';

    
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $query = "SELECT ID_Admin, Nom_utilisateur, Mot_de_passe FROM Admin WHERE Nom_utilisateur = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['Mot_de_passe'])) {
        
        echo "Connexion réussie en tant qu'administrateur.";
    } else {
        
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
