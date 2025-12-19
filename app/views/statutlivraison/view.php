<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir StatutLivraison</title>
</head>
<body>
    <h1>Voir Statut de Livraison</h1>
    <?php $d = $statutlivraisonData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>ID Livraison: <?= htmlspecialchars($d['idLivraison'] ?? $d['id_livraison'] ?? '') ?></li>
        <li>ID Statut: <?= htmlspecialchars($d['idStatut'] ?? $d['id_statut'] ?? '') ?></li>
        <li>Debut: <?= htmlspecialchars($d['debut'] ?? '') ?></li>
        <li>Fin: <?= htmlspecialchars($d['fin'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
