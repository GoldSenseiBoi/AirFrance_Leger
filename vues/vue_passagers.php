<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des passagers</title>
</head>
<body>
    <h1>Liste des passagers</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passagers as $passager): ?>
                <tr>
                    <td><?php echo $passager['ID_Passager']; ?></td>
                    <td><?php echo $passager['Nom']; ?></td>
                    <td><?php echo $passager['Prenom']; ?></td>
                    <td><?php echo $passager['DateNaissance']; ?></td>
                    <td><?php echo $passager['adresse']; ?></td>
                    <td><?php echo $passager['email']; ?></td>
                    <td><?php echo $passager['telephone']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
