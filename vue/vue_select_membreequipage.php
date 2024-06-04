<h3>Liste des membres d'équipage</h3>
<form method="post">
    <p>Filtrer par : </p><input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Membre Equipage</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                    <th>Date d'embauche</th>
                    <th>ID Vol</th>
                    <th>Opération</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($lesMembresEquipage)) {
                    foreach ($lesMembresEquipage as $unMembreEquipage) {
                        echo "<tr>";
                        echo "<td>".$unMembreEquipage['ID_MembreEquipage']."</td>";
                        echo "<td>".$unMembreEquipage['Nom']."</td>";
                        echo "<td>".$unMembreEquipage['Prenom']."</td>";
                        echo "<td>".$unMembreEquipage['Role']."</td>";
                        echo "<td>".$unMembreEquipage['DateEmbauche']."</td>";
                        echo "<td>".$unMembreEquipage['ID_Vol']."</td>";
                        echo "<td>";
                        echo "<a href='index.php?page=7&action=sup&idmembreequipage=".$unMembreEquipage['ID_MembreEquipage']."'><img src='image/supprimer.png' height='30' width='30'></a>";
                        echo "<a href='index.php?page=7&action=edit&idmembreequipage=".$unMembreEquipage['ID_MembreEquipage']."'><img src='image/editer.png' height='30' width='30'></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>