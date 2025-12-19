<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Voir Rapport de Livraison</title>
</head>
<body>
    <h1>Voir Rapport de Livraison</h1>
    <?php $d = $rapportData ?? []; ?>
    <ul>
        <li>ID: <?= htmlspecialchars($d['id'] ?? '') ?></li>
        <li>ID Livraison: <?= htmlspecialchars($d['idLivraison'] ?? $d['id_livraison'] ?? '') ?></li>
        <li>ID Dépense: <?= htmlspecialchars($d['idDepense'] ?? $d['id_depense'] ?? '') ?></li>
        <li>Recette: <?= htmlspecialchars($d['recette'] ?? '') ?></li>
        <li>Difference: <?= htmlspecialchars($d['difference'] ?? '') ?></li>
    </ul>
    <p><a href="/">Retour</a></p>
</body>
</html>
