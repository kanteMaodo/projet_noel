<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #1d3557;
            font-size: 28px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }

        button {
            padding: 5px 10px;
            margin: 2px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button a:hover {
            text-decoration: none;
        }

        p {
            text-align: center;
            color: #666;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            th, td {
                padding: 8px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <h1>Liste des Étudiants</h1>

    <?php
    //  connexion à la base de données
    require_once(__DIR__ . '/../../database.php');

    // Requête SQL pour récupérer la liste des étudiants
    $sql = "SELECT * FROM etudiants";
    $result = mysqli_query($conn, $sql);

    // Vérifier s'il y a des étudiants
    if ($result && mysqli_num_rows($result) > 0): 
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Filière</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nom']) ?></td>
                        <td><?= htmlspecialchars($row['prenom']) ?></td>
                        <td><?= htmlspecialchars($row['filiere']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <button><a href="edit.php?id=<?= htmlspecialchars($row['id']) ?>">Modifier</a></button>
                            <button><a href="supprimer.php?id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">Supprimer</a></button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div style="text-align: center; margin: 20px;">
            <button><a href="create.php">Ajouter un Étudiant</a></button>
            <button><a href="show.php">Affichage</a></button>
        </div>
    <?php else: ?>
        <p>Aucun étudiant trouvé.</p>
    <?php endif; ?>
</body>
</html>
