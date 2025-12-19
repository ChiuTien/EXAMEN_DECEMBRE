<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Année</title>
</head>
<body>
    <h1>Voir Année</h1>
    <?php $d = $yearData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Valeur: <?= htmlspecialchars($d['val'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
