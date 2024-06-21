<!-- vue/vue_select_vols.php -->
<h3>Liste des vols</h3>
<form method="post">
    <p>Filtrer par :</p>
    <select name="champ_filtre">
        <option value="NumeroVol" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'NumeroVol') ? 'selected' : '' ?>>Numéro de Vol</option>
        <option value="AeroportDepart" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'AeroportDepart') ? 'selected' : '' ?>>Aéroport de Départ</option>
        <option value="AeroportArrivee" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'AeroportArrivee') ? 'selected' : '' ?>>Aéroport d'Arrivée</option>
        <option value="Avion" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'Avion') ? 'selected' : '' ?>>Avion</option>
    </select>
    <input type="text" name="filtre" value="<?= isset($_POST['filtre']) ? $_POST['filtre'] : '' ?>">
    <input type="submit" name="Filtrer" value="Filtrer">
    <p>Trier par :</p>
    <select name="tri">
        <option value="recentes" <?= (isset($_POST['tri']) && $_POST['tri'] == 'recentes') ? 'selected' : '' ?>>Vols les plus récents</option>
        <option value="anciennes" <?= (isset($_POST['tri']) && $_POST['tri'] == 'anciennes') ? 'selected' : '' ?>>Vols les plus anciens</option>
    </select>
    <input type="submit" name="Trier" value="Trier">
</form>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Vol</th>
            <th>Numéro de vol</th>
            <th>Date de départ</th>
            <th>Heure de départ</th>
            <th>Aéroport de départ</th>
            <th>Date d'arrivée</th>
            <th>Heure d'arrivée</th>
            <th>Aéroport d'arrivée</th>
            <th>Avion</th>
            <th>Opération</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesVols)) {
            foreach ($lesVols as $unVol) {
                echo "<tr>";
                echo "<td>".$unVol['ID_Vol']."</td>";
                echo "<td>".$unVol['NumeroVol']."</td>";
                echo "<td>".$unVol['DateDepart']."</td>";
                echo "<td>".$unVol['HeureDepart']."</td>";
                echo "<td>".$unVol['AeroportDepart']."</td>";
                echo "<td>".$unVol['DateArrivee']."</td>";
                echo "<td>".$unVol['HeureArrivee']."</td>";
                echo "<td>".$unVol['AeroportArrivee']."</td>";
                echo "<td>".$unVol['Avion']."</td>";
                echo "<td>";
                echo "<a href='index.php?page=4&action=sup&idvol=".$unVol['ID_Vol']."'><img src='image/supprimer.png' height='30' width='30'></a>";
                echo "<a href='index.php?page=4&action=edit&idvol=".$unVol['ID_Vol']."'><img src='image/editer.png' height='30' width='30'></a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
