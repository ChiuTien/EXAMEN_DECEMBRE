<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Dépense</title>
</head>
<body>
    <h1>Voir Dépense</h1>
    <?php $d = $depenseData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Sal Chauffeur: <?= htmlspecialchars($d['salChauffeur'] ?? $d['sal_chauffeur'] ?? '') ?></li>
        <li>Dep Carburant: <?= htmlspecialchars($d['depCarburant'] ?? $d['dep_carburant'] ?? '') ?></li>
        <li>Dep Entretien: <?= htmlspecialchars($d['depEntretien'] ?? $d['dep_entretien'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
