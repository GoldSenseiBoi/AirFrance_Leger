<h3>Ajout/Modification d'un membre d'équipage</h3>
<form method="post">
    <table>
        <tr>
            <td>ID Membre d'équipage</td>
            <td><input type="text" name="ID_MembreEquipage" value="<?= ($leMembre != null) ? $leMembre['ID_MembreEquipage'] : '' ?>"></td>
        </tr>
        <tr>
            <td>ID Personne</td>
            <td><input type="text" name="ID_Personne" value="<?= ($leMembre != null) ? $leMembre['ID_Personne'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Rôle</td>
            <td>
                <select name="Role">
                    <option value="Pilote" <?= ($leMembre != null && $leMembre['Role'] == 'Pilote') ? 'selected' : '' ?>>Pilote</option>
                    <option value="Copilote" <?= ($leMembre != null && $leMembre['Role'] == 'Copilote') ? 'selected' : '' ?>>Copilote</option>
                    <option value="Hôtesse de l'air" <?= ($leMembre != null && $leMembre['Role'] == 'Hôtesse de l\'air') ? 'selected' : '' ?>>Hôtesse de l'air</option>
                    <option value="Steward" <?= ($leMembre != null && $leMembre['Role'] == 'Steward') ? 'selected' : '' ?>>Steward</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Date d'embauche</td>
            <td><input type="date" name="DateEmbauche" value="<?= ($leMembre != null) ? $leMembre['DateEmbauche'] : '' ?>"></td>
        </tr>
        <tr>
            <td>ID Vol</td>
            <td><input type="text" name="ID_Vol" value="<?= ($leMembre != null) ? $leMembre['ID_Vol'] : '' ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" <?= ($leMembre != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>
                <input type="reset" name="Annuler" value="Annuler">
            </td>
        </tr>
        <?= ($leMembre != null) ? '<input type="hidden" name="ID_MembreEquipage" value="'.$leMembre['ID_MembreEquipage'].'">' : '' ?>
    </table>
</form>
