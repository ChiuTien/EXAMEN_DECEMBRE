<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dépenses</title>
</head>
<body>
    <h1>Liste des Dépenses</h1>
    <?php if (empty($depenses)): ?>
        <p>Aucune dépense trouvée.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sal Chauffeur</th>
                    <th>Dep Carburant</th>
                    <th>Dep Entretien</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($depenses as $d): ?>
                    <tr style="cursor:pointer" onclick="window.location='/depenses/<?= htmlspecialchars($d['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($d['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($d['salChauffeur'] ?? $d['sal_chauffeur'] ?? '') ?></td>
                        <td><?= htmlspecialchars($d['depCarburant'] ?? $d['dep_carburant'] ?? '') ?></td>
                        <td><?= htmlspecialchars($d['depEntretien'] ?? $d['dep_entretien'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
