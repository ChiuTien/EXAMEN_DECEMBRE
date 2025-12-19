<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Colis</title>
</head>
<body>
    <h1>Voir Colis</h1>
    <?php $d = $colisData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Valeur: <?= htmlspecialchars($d['val'] ?? '') ?></li>
        <li>Image: <?= htmlspecialchars($d['img'] ?? '') ?></li>
        <li>Poids: <?= htmlspecialchars($d['poids'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
