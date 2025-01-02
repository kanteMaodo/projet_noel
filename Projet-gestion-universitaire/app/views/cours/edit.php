<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Cours</title>
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
            color: #0056b3;
            margin-top: 30px;
            font-size: 2rem;
        }

        form {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            background-color: #0056b3;
            color: #fff;
            padding: 12px 20px;
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

        .back-btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .message {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .message.success {
            color: #0056b3;
        }

        .message.error {
            color: #0056b3;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            form {
                width: 90%;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <h1>Modifier un Cours</h1>

    <?php
    // Inclure le fichier de connexion à la base de données
    require_once(__DIR__ . '/../../database.php');

    // Initialiser les variables
    $id = $nom_cours = $code_cours = $nombre_heure  = "";

    // Vérifier si un ID est passé via l'URL
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        //Récupérer les données  à modifier
        $sql = "SELECT * FROM cours WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $cours = mysqli_fetch_assoc($result);
            $nom_cours = $cours['nom_cours'];
            $code_cours = $cours['code_cours'];
            $nombre_heure = $cours['nombre_heure'];
        } else {
            echo "<p class='message error'>Ce cours est introuvable.</p>";
            exit;
        }
    } else {
        echo "<p class='message error'>Aucun ID fourni pour modifier ce cours.</p>";
        exit;
    }

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données modifiées du formulaire
        $nom_cours = mysqli_real_escape_string($conn, $_POST['nom_cours']);
        $code_cours = mysqli_real_escape_string($conn, $_POST['code_cours']);
        $nombre_heure = mysqli_real_escape_string($conn, $_POST['nombre_heure']);

        // Validation des champs
        if (empty($nom_cours) || empty($code_cours) || empty($nombre_heure)) {
            echo "<p class='message error'>Tous les champs sont obligatoires.</p>";
        } else {
            // Requête SQL pour mettre à jour le cours
            $sql = "UPDATE cours SET nom_cours='$nom_cours', code_cours='$code_cours', nombre_heure='$nombre_heure' WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                echo "<p class='message success'>Cours modifié avec succès !</p>";
            } else {
                echo "<p class='message error'>Erreur : " . mysqli_error($conn) . "</p>";
            }
        }
    }
    ?>

    <!-- Formulaire -->
    <form method="POST" action="">
        <label for="nom_cours">Nom du Cours :</label><br>
        <input type="text" id="nom_cours" name="nom_cours" value="<?= htmlspecialchars($nom_cours) ?>" required><br>

        <label for="code_cours">Code du Cours :</label><br>
        <input type="text" id="code_cours" name="code_cours" value="<?= htmlspecialchars($code_cours) ?>" required><br>

        <label for="nombre_heure">Nombre d'Heures :</label><br>
        <input type="text" id="nombre_heure" name="nombre_heure" value="<?= htmlspecialchars($nombre_heure) ?>" required><br>

        <button type="submit">Modifier Cours</button>
    </form>

    <div class="back-btn-container">
        <button><a href="index.php">Retour à la liste des cours</a></button>
    </div>

</body>
</html>
