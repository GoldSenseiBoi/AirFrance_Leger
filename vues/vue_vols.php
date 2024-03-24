<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des vols</title>
</head>
<body>
    <h1>Liste des vols</h1>
    <ul>
        <?php foreach ($vols as $vol): ?>
            <li><?php echo $vol['NumeroVol']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
