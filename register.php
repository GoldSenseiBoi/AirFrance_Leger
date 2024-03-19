<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once 'config/database.php';

    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $nationalite = $_POST['nationalite'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    
    $query = "INSERT INTO Client (Nom, Prenom, Age, Nationalite, Telephone, Adresse, Email, Mot_de_passe) VALUES (:nom, :prenom, :age, :nationalite, :telephone, :adresse, :email, :mot_de_passe)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':nationalite', $nationalite);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);

   
    if ($stmt->execute()) {
      
        echo "Inscription réussie pour $prenom $nom.";
    } else {
        
        echo "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
    }
}
?>
