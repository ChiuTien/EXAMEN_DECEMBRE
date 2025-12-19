<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Statuts</title>
</head>
<body>
    <h1>Liste des Statuts</h1>
    <?php if (empty($statuts)): ?>
        <p>Aucun statut trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statuts as $s): ?>
                    <tr style="cursor:pointer" onclick="window.location='/statuts/<?= htmlspecialchars($s['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($s['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($s['val'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
