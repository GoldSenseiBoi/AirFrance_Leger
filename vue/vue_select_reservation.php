<!-- vue/vue_select_reservation.php -->
<h3>Liste des réservations</h3>
<form method="post">
    <p>Filtrer par :</p>
    <select name="champ_filtre">
        <option value="nom" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'nom') ? 'selected' : '' ?>>Nom</option>
        <option value="prenom" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'prenom') ? 'selected' : '' ?>>Prénom</option>
        <option value="NumeroVol" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'NumeroVol') ? 'selected' : '' ?>>Numéro de Vol</option>
        <option value="SiegeAttribue" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'SiegeAttribue') ? 'selected' : '' ?>>Siège attribué</option>
    </select>
    <input type="text" name="filtre" value="<?= isset($_POST['filtre']) ? $_POST['filtre'] : '' ?>">
    <input type="submit" name="Filtrer" value="Filtrer">
    <p>Trier par :</p>
    <select name="tri">
        <option value="recentes" <?= (isset($_POST['tri']) && $_POST['tri'] == 'recentes') ? 'selected' : '' ?>>Réservations les plus récentes</option>
        <option value="anciennes" <?= (isset($_POST['tri']) && $_POST['tri'] == 'anciennes') ? 'selected' : '' ?>>Réservations les plus anciennes</option>
    </select>
    <input type="submit" name="Trier" value="Trier">
</form>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Réservation</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro de Vol</th>
            <th>Date de réservation</th>
            <th>Siège attribué</th>
            <th>Opération</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesReservations)) {
            foreach ($lesReservations as $uneReservation) {
                echo "<tr>";
                echo "<td>".$uneReservation['ID_Reservation']."</td>";
                echo "<td>".$uneReservation['nom']."</td>";
                echo "<td>".$uneReservation['prenom']."</td>";
                echo "<td>".$uneReservation['NumeroVol']."</td>";
                echo "<td>".$uneReservation['DateReservation']."</td>";
                echo "<td>".$uneReservation['SiegeAttribue']."</td>";
                echo "<td>";
                echo "<a href='index.php?page=5&action=sup&idreservation=".$uneReservation['ID_Reservation']."'><img src='image/supprimer.png' height='30' width='30'></a>";
                echo "<a href='index.php?page=5&action=edit&idreservation=".$uneReservation['ID_Reservation']."'><img src='image/editer.png' height='30' width='30'></a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
