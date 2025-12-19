<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Statuts de Livraison</title>
</head>
<body>
    <h1>Liste des Statuts de Livraison</h1>
    <?php if (empty($statutlivraisons)): ?>
        <p>Aucun statut de livraison trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Livraison</th>
                    <th>ID Statut</th>
                    <th>Debut</th>
                    <th>Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statutlivraisons as $s): ?>
                    <tr style="cursor:pointer" onclick="window.location='/statutlivraisons/<?= htmlspecialchars($s['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($s['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($s['idLivraison'] ?? $s['id_livraison'] ?? '') ?></td>
                        <td><?= htmlspecialchars($s['idStatut'] ?? $s['id_statut'] ?? '') ?></td>
                        <td><?= htmlspecialchars($s['debut'] ?? '') ?></td>
                        <td><?= htmlspecialchars($s['fin'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
