<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rapports de Livraison</title>
</head>
<body>
    <h1>Liste des Rapports de Livraison</h1>
    <?php if (empty($rapports)): ?>
        <p>Aucun rapport trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Livraison</th>
                    <th>ID Dépense</th>
                    <th>Recette</th>
                    <th>Difference</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rapports as $r): ?>
                    <tr style="cursor:pointer" onclick="window.location='/rapports/<?= htmlspecialchars($r['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($r['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['idLivraison'] ?? $r['id_livraison'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['idDepense'] ?? $r['id_depense'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['recette'] ?? '') ?></td>
                        <td><?= htmlspecialchars($r['difference'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
