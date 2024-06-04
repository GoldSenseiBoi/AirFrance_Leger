<h3>Liste des avions</h3>
<form method="post">
    <p>Filtrer par : </p><input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Avion</th>
                <th>Modèle</th>
                <th>Nombre de sièges</th>
                <th>Opération</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($lesAvions)) {
                foreach ($lesAvions as $avion) {
                    echo "<tr>";
                    echo "<td>".$avion['ID_Avion']."</td>";
                    echo "<td>".$avion['Modele']."</td>";
                    echo "<td>".$avion['NombrePlaces']."</td>";
                    echo "<td>";
                    echo "<a href='index.php?page=3&action=sup&idAvion=".$avion['ID_Avion']."'><img src='image/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=3&action=edit&idAvion=".$avion['ID_Avion']."'><img src='image/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>