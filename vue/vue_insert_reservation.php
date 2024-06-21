<!-- vue/vue_insert_reservation.php -->
<h3>Ajout/Modification d'une réservation</h3>
<form method="post">
    <table>
        <tr>
            <td>Passager</td>
            <td>
                <select name="ID_Passager">
                    <?php foreach ($lesPassagers as $passager) : ?>
                        <option value="<?= $passager['ID_Passager'] ?>" <?= ($lReservation != null && isset($lReservation['ID_Passager']) && $lReservation['ID_Passager'] == $passager['ID_Passager']) ? 'selected' : '' ?>>
                            <?= $passager['NumPasseport'] . " - " . $passager['Nom'] . " " . $passager['Prenom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Vol</td>
            <td>
                <select name="ID_Vol">
                    <?php foreach ($lesVols as $vol) : ?>
                        <option value="<?= $vol['ID_Vol'] ?>" <?= ($lReservation != null && isset($lReservation['ID_Vol']) && $lReservation['ID_Vol'] == $vol['ID_Vol']) ? 'selected' : '' ?>>
                            <?= $vol['NumeroVol'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Date de réservation</td>
            <td><input type="date" name="DateReservation" value="<?= ($lReservation != null && isset($lReservation['DateReservation'])) ? $lReservation['DateReservation'] : '' ?>" required></td>
        </tr>
        <tr>
            <td>Siège attribué</td>
            <td><input type="text" name="SiegeAttribue" value="<?= ($lReservation != null && isset($lReservation['SiegeAttribue'])) ? $lReservation['SiegeAttribue'] : '' ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" <?= ($lReservation != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>
                <input name="Annuler" type="button" onclick="annulerModification()" value="Annuler">
            </td>
        </tr>
        <?= ($lReservation != null) ? '<input type="hidden" name="ID_Reservation" value="'.$lReservation['ID_Reservation'].'">' : '' ?>
    </table>
    <script>
    function annulerModification() {
        // Redirection vers la page 5
        window.location.href = "index.php?page=5";
    }
    </script>
</form>
<img src="image/plan_avion.png">
