<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Equivalences</title>
</head>
<body>
    <h1>Liste des Equivalences</h1>
    <?php if (empty($equivalences)): ?>
        <p>Aucune equivalence trouvée.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PMin</th>
                    <th>PMax</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equivalences as $e): ?>
                    <tr style="cursor:pointer" onclick="window.location='/equivalences/<?= htmlspecialchars($e['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($e['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($e['pMin'] ?? $e['p_min'] ?? '') ?></td>
                        <td><?= htmlspecialchars($e['pMax'] ?? $e['p_max'] ?? '') ?></td>
                        <td><?= htmlspecialchars($e['prix'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
