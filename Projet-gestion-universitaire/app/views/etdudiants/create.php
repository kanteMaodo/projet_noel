<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Étudiant</title>
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
            color: #007bff;
            margin-top: 20px;
            font-size: 28px;
        }

        form {
            width: 90%;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                width: 95%;
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Créer un Étudiant</h1>
    
    <?php
    // Inclure le fichier de connexion à la base de données
    require_once(__DIR__ . '/../../database.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire en les sécurisant
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $filiere = mysqli_real_escape_string($conn, $_POST['filiere']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Validation des champs
        if (empty($nom) || empty($prenom) || empty($filiere) || empty($email)) {
            echo "<p style='color: red;'>Tous les champs sont obligatoires.</p>";
        } else {
            // Requête SQL pour insérer un étudiant
            $sql = "INSERT INTO etudiants (nom, prenom, filiere, email) VALUES ('$nom', '$prenom', '$filiere', '$email')";

            if (mysqli_query($conn, $sql)) {
                echo "<p style='color: green;'>Étudiant créé avec succès !</p>";
            } else {
                echo "<p style='color: red;'>Erreur : " . mysqli_error($conn) . "</p>";
            }
        }
    }
    ?>

    <!-- Formulaire -->
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="filiere">Filière :</label>
        <input type="text" id="filiere" name="filiere" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Créer Étudiant</button>
        <button><a href="index.php">Retour à la liste</a></button>
    </form>
</body>
</html>
