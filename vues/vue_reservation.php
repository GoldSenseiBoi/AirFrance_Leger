<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
</head>
<body>
    <h1>Liste des réservations</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Passager</th>
                <th>ID Vol</th>
                <th>Date de réservation</th>
                <th>Siège attribué</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?php echo $reservation['ID_Reservation']; ?></td>
                    <td><?php echo $reservation['ID_Passager']; ?></td>
                    <td><?php echo $reservation['ID_Vol']; ?></td>
                    <td><?php echo $reservation['DateReservation']; ?></td>
                    <td><?php echo $reservation['SiegeAttribue']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
