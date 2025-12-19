<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">tle>
</head>
<body>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Entrepôts</ti
    <h1>Liste des Entrepôts</h1>
    <?php if (empty($entrepots)): ?>
        <p>Aucun entrepôt trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entrepots as $e): ?>
                    <tr style="cursor:pointer" onclick="window.location='/entrepots/<?= htmlspecialchars($e['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($e['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($e['adresse']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
