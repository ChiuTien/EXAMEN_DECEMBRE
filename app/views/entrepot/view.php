<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Entrepôt</title>
</head>
<body>
    <h1>Voir Entrepôt</h1>
    <?php $d = $entrepotData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Adresse: <?= htmlspecialchars($d['addresse'] ?? $d['val'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
