<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Binome</title>
</head>
<body>
    <h1>Voir Binome</h1>
    <?php $d = $binomeData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>ID Livreur: <?= htmlspecialchars($d['idLivreur'] ?? $d['id_livreur'] ?? '') ?></li>
        <li>ID Vehicule: <?= htmlspecialchars($d['idVehicule'] ?? $d['id_vehicule'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
