<?php
// Inclure le fichier de connexion à la base de données
require_once(__DIR__ . '/../../database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cours</title>
    <style>
        /* Global body style */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f5;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #1d3557;
            margin-top: 20px;
            font-size: 2rem;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #0056b38f;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Button styling */
        button {
            background-color: #0056b3;
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }

        /* Centered text for messages */
        p {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 20px;
            color: #0056b3;
        }

        .back-btn-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Affichage Des Cours</h1>

    <?php
    // Fetch courses from the database
    $sql = "SELECT * FROM cours";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0): 
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Cours</th>
                    <th>Code Cours</th>
                    <th>Nombre Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['nom_cours']) ?></td>
                        <td><?= htmlspecialchars($row['code_cours']) ?></td>
                        <td><?= htmlspecialchars($row['nombre_heure']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="back-btn-container">
            <button><a href="index.php">Retour à la création des étudiants</a></button>
        </div>

    <?php else: ?>
        <p>Aucun cours trouvé.</p>
    <?php endif; ?>

</body>
</html>
