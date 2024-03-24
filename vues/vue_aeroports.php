<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des aéroports</title>
</head>
<body>
    <h1>Liste des aéroports</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Localisation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aeroports as $aeroport): ?>
                <tr>
                    <td><?php echo $aeroport['ID_Aeroport']; ?></td>
                    <td><?php echo $aeroport['Nom']; ?></td>
                    <td><?php echo $aeroport['Localisation']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
