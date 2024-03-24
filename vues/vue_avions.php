<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des avions</title>
</head>
<body>
    <h1>Liste des avions</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Modèle</th>
                <th>Nombre de places</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($avions as $avion): ?>
                <tr>
                    <td><?php echo $avion['ID_Avion']; ?></td>
                    <td><?php echo $avion['Modele']; ?></td>
                    <td><?php echo $avion['NombrePlaces']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
