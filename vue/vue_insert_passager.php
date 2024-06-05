<?php
// Initialisation de $lePassager à null si elle n'est pas définie
if (!isset($lePassager)) {
    $lePassager = null;
}
?>

<h3>Ajout/Modification d'un passager</h3>
<form method="post">
    <table>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="Nom" value="<?= ($lePassager != null) ? $lePassager['Nom'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td><input type="text" name="Prenom" value="<?= ($lePassager != null) ? $lePassager['Prenom'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="Email" value="<?= ($lePassager != null) ? $lePassager['Email'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td><input type="text" name="Telephone" value="<?= ($lePassager != null) ? $lePassager['Telephone'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Numéro de Passeport</td>
            <td><input type="text" name="NumPasseport" value="<?= ($lePassager != null) ? $lePassager['NumPasseport'] : '' ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" <?= ($lePassager != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>
                <input name="Annuler" type="button" onclick="annulerModification()"value="Annuler">
            </td>
        </tr>
        <?= ($lePassager != null) ? '<input type="hidden" name="ID_Passager" value="'.$lePassager['ID_Passager'].'">' : '' ?>
    </table>
    <script>
function annulerModification() {
    
    window.location.href = "index.php?page=6";
}
</script>
</form>
