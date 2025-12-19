<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Livraison</title>
</head>
<body>
    <h1>Voir Livraison</h1>
    <?php $d = $livraisonData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>ID Binome: <?= htmlspecialchars($d['idBinome'] ?? $d['id_binome'] ?? '') ?></li>
        <li>ID Jour: <?= htmlspecialchars($d['idDay'] ?? $d['id_jour'] ?? '') ?></li>
        <li>ID Zone: <?= htmlspecialchars($d['idZone'] ?? $d['id_zone'] ?? '') ?></li>
        <li>ID Colis: <?= htmlspecialchars($d['idColis'] ?? $d['id_colis'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
