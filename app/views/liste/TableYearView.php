<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Années</title>
</head>
<body>
    <h1>Liste des Années</h1>
    <?php if (empty($years)): ?>
        <p>Aucune année trouvée.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($years as $y): ?>
                    <tr style="cursor:pointer" onclick="window.location='/years/<?= htmlspecialchars($y['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($y['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($y['val'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
