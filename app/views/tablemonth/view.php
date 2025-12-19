<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Mois</title>
</head>
<body>
    <h1>Voir Mois</h1>
    <?php $d = $monthData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Valeur: <?= htmlspecialchars($d['val'] ?? '') ?></li>
        <li>ID Année: <?= htmlspecialchars($d['idYear'] ?? $d['id_year'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
