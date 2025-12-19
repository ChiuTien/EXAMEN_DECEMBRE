<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Livreur</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <h1>Voir Livreur</h1>
    <?php $d = $livreurData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>Nom: <?= htmlspecialchars($d['nom'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
