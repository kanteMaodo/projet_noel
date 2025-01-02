<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color:rgb(24, 189, 207);
            margin: 20px 0;
            font-size: 28px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color:rgb(49, 103, 227);
            color: #ffffff;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 14px;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color:rgb(49, 103, 227);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-transform: uppercase;
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
            text-decoration: underline;
        }

        p {
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Affichage Étudiants</h1>

    <?php
    // Inclure le fichier de connexion à la base de données
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
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button><a href="index.php">Retour à création d'étudiants</a></button>
    <?php else: ?>
        <p>Aucun étudiant trouvé.</p>
    <?php endif; ?>
</body>
</html>
