<h3>Liste des passagers</h3>
<form method="post">
    <p>Filtrer par : </p><input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Passager</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Numéro de Passeport</th>
                    <th>Opération</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($lesPassagers)) {
                    foreach ($lesPassagers as $unPassager) {
                        echo "<tr>";
                        echo "<td>".$unPassager['ID_Passager']."</td>";
                        echo "<td>".$unPassager['Nom']."</td>";
                        echo "<td>".$unPassager['Prenom']."</td>";
                        echo "<td>".$unPassager['Email']."</td>";
                        echo "<td>".$unPassager['Telephone']."</td>";
                        echo "<td>".$unPassager['NumPasseport']."</td>";
                        echo "<td>";
                        echo "<a href='index.php?page=6&action=sup&idpassager=".$unPassager['ID_Passager']."'><img src='image/supprimer.png' height='30' width='30'></a>";
                        echo "<a href='index.php?page=6&action=edit&idpassager=".$unPassager['ID_Passager']."'><img src='image/editer.png' height='30' width='30'></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>