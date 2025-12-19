<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livraisons</title>
</head>
<body>
    <h1>Liste des Livraisons</h1>
    <?php if (empty($livraisons)): ?>
        <p>Aucune livraison trouvée.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Binome</th>
                    <th>ID Jour</th>
                    <th>ID Zone</th>
                    <th>ID Colis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livraisons as $l): ?>
                    <tr style="cursor:pointer" onclick="window.location='/livraisons/<?= htmlspecialchars($l['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($l['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($l['idBinome'] ?? $l['id_binome'] ?? '') ?></td>
                        <td><?= htmlspecialchars($l['idDay'] ?? $l['idDay'] ?? $l['id_jour'] ?? '') ?></td>
                        <td><?= htmlspecialchars($l['idZone'] ?? $l['id_zone'] ?? '') ?></td>
                        <td><?= htmlspecialchars($l['idColis'] ?? $l['id_colis'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
