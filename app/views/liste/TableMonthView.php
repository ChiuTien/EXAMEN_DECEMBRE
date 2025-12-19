<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Mois</title>
</head>
<body>
    <h1>Liste des Mois</h1>
    <?php if (empty($months)): ?>
        <p>Aucun mois trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valeur</th>
                    <th>ID Année</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($months as $m): ?>
                    <tr style="cursor:pointer" onclick="window.location='/months/<?= htmlspecialchars($m['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($m['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($m['val'] ?? '') ?></td>
                        <td><?= htmlspecialchars($m['idYear'] ?? $m['id_year'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
