<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Jour</title>
</head>
<body>
    <h1>Voir Jour</h1>
    <?php $d = $dayData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Jour: <?= htmlspecialchars($d['jour'] ?? '') ?></li>
        <li>ID Month: <?= htmlspecialchars($d['idMonth'] ?? $d['id_month'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
