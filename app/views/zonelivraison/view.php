<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Zone de Livraison</title>
</head>
<body>
    <h1>Voir Zone de Livraison</h1>
    <?php $d = $zoneData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>ID Entrepôt: <?= htmlspecialchars($d['idEntrepot'] ?? $d['id_entrepot'] ?? '') ?></li>
        <li>ID Destination: <?= htmlspecialchars($d['idDestination'] ?? $d['id_destination'] ?? '') ?></li>
        <li>Distance: <?= htmlspecialchars($d['distance'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
