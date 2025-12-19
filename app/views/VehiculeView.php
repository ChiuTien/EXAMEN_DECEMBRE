<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Véhicules</title>
</head>
<body>
    <h1>Liste des Véhicules</h1>
    
    <?php if (empty($vehicules)): ?>
        <p>Aucun véhicule trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matricule</th>
                    <th>Carburant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicules as $vehicule): ?>
                    <tr>
                        <td><?= htmlspecialchars($vehicule['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($vehicule['matricule'] ?? '') ?></td>
                        <td><?= htmlspecialchars($vehicule['carburant'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>