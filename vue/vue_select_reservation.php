<h3>Liste des réservations</h3>
<form method="post">
    <p>Filtrer par : </p><input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Réservation</th>
                    <th>ID Passager</th>
                    <th>ID Vol</th>
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
                        echo "<td>".$uneReservation['ID_Passager']."</td>";
                        echo "<td>".$uneReservation['ID_Vol']."</td>";
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