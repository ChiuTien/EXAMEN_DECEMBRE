<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Carburants</title>
</head>
<body>
    <h1>Liste des Carburants</h1>
    <?php if (empty($carburants)): ?>
        <p>Aucun carburant trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valeur</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carburants as $c): ?>
                    <tr style="cursor:pointer" onclick="window.location='/carburants/<?= htmlspecialchars($c['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($c['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($c['val'] ?? '') ?></td>
                        <td><?= htmlspecialchars($c['prix'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
