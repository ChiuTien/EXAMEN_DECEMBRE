<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Carburant</title>
</head>
<body>
    <h1>Voir Carburant</h1>
    <?php $d = $carburantData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Valeur: <?= htmlspecialchars($d['val'] ?? '') ?></li>
        <li>Prix: <?= htmlspecialchars($d['prix'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
