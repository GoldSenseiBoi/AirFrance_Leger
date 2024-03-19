<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once 'config/database.php';

   
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $query = "SELECT ID_Client, Nom, Mot_de_passe FROM Client WHERE Email = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if ($user && password_verify($password, $user['Mot_de_passe'])) {
       
        echo "Connexion réussie pour l'utilisateur " . $user['Nom'];
    } else {
        
        echo "Adresse e-mail ou mot de passe incorrect.";
    }
}
?>
