<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Binomes</title>
</head>
<body>
    <h1>Liste des Binomes</h1>
    <?php if (empty($binomes)): ?>
        <p>Aucun binome trouvé.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Livreur</th>
                    <th>ID Vehicule</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($binomes as $b): ?>
                    <tr style="cursor:pointer" onclick="window.location='/binomes/<?= htmlspecialchars($b['id'] ?? '') ?>'">
                        <td><?= htmlspecialchars($b['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($b['idLivreur'] ?? $b['id_livreur'] ?? '') ?></td>
                        <td><?= htmlspecialchars($b['idVehicule'] ?? $b['id_vehicule'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
