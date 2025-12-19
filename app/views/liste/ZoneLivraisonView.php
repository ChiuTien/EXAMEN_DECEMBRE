<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Zones de Livraison</title>
</head>
<body>
    <h1>Liste des Zones de Livraison</h1>
    <?php if (empty($zones)): ?>
        <p>Aucune zone trouvée.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Entrepôt</th>
                    <th>ID Destination</th>
                    <th>Distance</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zones as $z): ?>
                    <tr style="cursor:pointer" onclick="window.location='/zones/<?= htmlspecialchars($z['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($z['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($z['idEntrepot'] ?? $z['id_entrepot'] ?? '') ?></td>
                        <td><?= htmlspecialchars($z['idDestination'] ?? $z['id_destination'] ?? '') ?></td>
                        <td><?= htmlspecialchars($z['distance'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
