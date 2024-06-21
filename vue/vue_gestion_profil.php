<!-- vue/vue_gestion_profil.php -->

<form method="post" action="">
    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($_SESSION['prenom']); ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required>
    </div>
    <div class="form-group">
        <label for="mdp">Nouveau mot de passe :</label>
        <input type="password" class="form-control" id="mdp" name="mdp">
    </div>
    <div class="form-group">
        <label for="confirm_mdp">Confirmez le mot de passe :</label>
        <input type="password" class="form-control" id="confirm_mdp" name="confirm_mdp">
    </div>
    <button type="submit" class="btn btn-primary" name="modifierProfil">Modifier</button>
</form>
