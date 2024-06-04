<h3>Liste des aéroports</h3>
<form method="post">
    <p>Filtrer par : </p><input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Aéroport</th>
                <th>Nom Aéroport</th>
                <th>Localisation</th>
                <th>Opération</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($lesAeroports)) {
                foreach ($lesAeroports as $aeroport) {
                    echo "<tr>";
                    echo "<td>".$aeroport['ID_Aeroport']."</td>";
                    echo "<td>".$aeroport['Nom']."</td>";
                    echo "<td>".$aeroport['Localisation']."</td>";
                    echo "<td>";
                    echo "<a href='index.php?page=2&action=sup&idAeroport=".$aeroport['ID_Aeroport']."'><img src='image/supprimer.png' height='30' width='30'></a>";
                    echo "<a href='index.php?page=2&action=edit&idAeroport=".$aeroport['ID_Aeroport']."'><img src='image/editer.png' height='30' width='30'></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>