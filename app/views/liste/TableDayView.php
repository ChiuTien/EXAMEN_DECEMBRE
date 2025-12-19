<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Jours</title>
</head>
<body>
    <h1>Liste des Jours</h1>
    <?php if (empty($days)): ?>
        <p>Aucun jour trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jour</th>
                    <th>ID Month</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($days as $d): ?>
                    <tr style="cursor:pointer" onclick="window.location='/days/<?= htmlspecialchars($d['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($d['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($d['jour'] ?? '') ?></td>
                        <td><?= htmlspecialchars($d['idMonth'] ?? $d['id_month'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
