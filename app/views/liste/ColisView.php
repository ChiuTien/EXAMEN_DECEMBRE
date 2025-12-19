<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Colis</title>
</head>
<body>
    <h1>Liste des Colis</h1>
    <?php if (empty($colis)): ?>
        <p>Aucun colis trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valeur</th>
                    <th>Image</th>
                    <th>Poids</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($colis as $c): ?>
                    <tr style="cursor:pointer" onclick="window.location='/colis/<?= htmlspecialchars($c['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($c['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($c['val'] ?? '') ?></td>
                        <td><?= htmlspecialchars($c['img'] ?? '') ?></td>
                        <td><?= htmlspecialchars($c['poids'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
