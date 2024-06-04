<h3>Liste des vols</h3>
<form method="post">
    <p>Filtrer par : </p><input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
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