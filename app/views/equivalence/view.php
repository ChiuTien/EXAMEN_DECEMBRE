<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Equivalence</title>
</head>
<body>
    <h1>Voir Equivalence</h1>
    <?php $d = $equivalenceData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>PMin: <?= htmlspecialchars($d['pMin'] ?? $d['p_min'] ?? '') ?></li>
        <li>PMax: <?= htmlspecialchars($d['pMax'] ?? $d['p_max'] ?? '') ?></li>
        <li>Prix: <?= htmlspecialchars($d['prix'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
