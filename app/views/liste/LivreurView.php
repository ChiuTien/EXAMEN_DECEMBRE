<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livreurs</title>
</head>
<body>
    <h1>Liste des Livreurs</h1>
    <?php if (empty($livreur)): ?>
        <p>Aucun livreur trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livreur as $l): ?>
                    <tr>
                        <td><?= htmlspecialchars($l['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($l['nom'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
