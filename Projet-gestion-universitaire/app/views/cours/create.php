<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #1d3557;
            margin-bottom: 20px;
        }

        form {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button a {
            color: #fff;
            text-decoration: none;
        }

        button a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            font-size: 14px;
            color: red;
            margin-bottom: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    
    <?php
    require_once(__DIR__ . '/../../database.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom_cours = mysqli_real_escape_string($conn, $_POST['nom_cours']);
        $code_cours = mysqli_real_escape_string($conn, $_POST['code_cours']);
        $nombre_heure = mysqli_real_escape_string($conn, $_POST['nombre_heure']);

        if (empty($nom_cours) || empty($code_cours) || empty($nombre_heure)) {
            echo "<p>Tous les champs sont obligatoires.</p>";
        } else {
            $sql = "INSERT INTO cours (nom_cours, code_cours, nombre_heure) VALUES ('$nom_cours', '$code_cours', '$nombre_heure')";

            if (mysqli_query($conn, $sql)) {
                echo "<p style='color: green;'>Cours créé avec succès !</p>";
            } else {
                echo "<p>Erreur : " . mysqli_error($conn) . "</p>";
            }
        }
    }
    ?>

    <form method="POST" action="">
        <h1>Créer un Cours</h1>
        <label for="nom_cours">Nom du Cours :</label>
        <input type="text" id="nom_cours" name="nom_cours" required>

        <label for="code_cours">Code du Cours :</label>
        <input type="text" id="code_cours" name="code_cours" required>

        <label for="nombre_heure">Nombre d'Heures :</label>
        <input type="text" id="nombre_heure" name="nombre_heure" required>

        <button type="submit">Planifier Cours</button>
        <button><a href="index.php">Retour aux Cours</a></button>
    </form>
</body>
</html>
