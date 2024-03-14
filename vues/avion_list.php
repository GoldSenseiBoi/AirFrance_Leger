<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des avions</title>
</head>
<body>
    <h1>Liste des avions</h1>
    <ul>
        <?php foreach ($avions as $avion): ?>
            <li><?php echo $avion['Modele']; ?> - Capacité: <?php echo $avion['Capacite']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
