<?php
// Inclure le fichier de connexion à la base de données
require_once(__DIR__ . '/../../database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les cours</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #444;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #1d3557;
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .button {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .button-delete {
            background-color: #e63946;
        }

        .button-delete:hover {
            background-color: #b12a36;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons .button {
            margin-right: 5px;
        }

        p {
            text-align: center;
            font-size: 16px;
            margin: 20px;
            color: #666;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 10px;
            background-color: #1d3557;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Gérer Les Cours</h1>

    <?php
    $sql = "SELECT * FROM cours";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0): 
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du cours</th>
                    <th>Code du cours</th>
                    <th>Nombre d'heures</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nom_cours']) ?></td>
                        <td><?= htmlspecialchars($row['code_cours']) ?></td>
                        <td><?= htmlspecialchars($row['nombre_heure']) ?></td>
                        <td class="action-buttons">
                            <a href="edit.php?id=<?= htmlspecialchars($row['id']) ?>" class="button">Modifier</a>
                            <a href="supprimer.php?id=<?= htmlspecialchars($row['id']) ?>" 
                               class="button button-delete"
                               onclick="return confirm('Voulez-vous vraiment supprimer ce cours ?');">
                               Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="button-container">
            <a href="create.php" class="button">Ajouter un cours</a>
            <a href="show.php" class="button">Affichage</a>
        </div>
    <?php else: ?>
        <p>Aucun cours trouvé.</p>
    <?php endif; ?>

    <div class="footer">
        &copy; 2025 Gestion des cours. Tous droits réservés.
    </div>
</body>
</html>
