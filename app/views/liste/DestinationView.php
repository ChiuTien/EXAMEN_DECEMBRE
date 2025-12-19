<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Destinations</title>
</head>
<body>
    <h1>Liste des Destinations</h1>
    <?php if (empty($destinations)): ?>
        <p>Aucune destination trouvée.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($destinations as $d): ?>
                    <tr style="cursor:pointer" onclick="window.location='/destinations/<?= htmlspecialchars($d['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($d['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($d['addresse'] ?? $d['val'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
