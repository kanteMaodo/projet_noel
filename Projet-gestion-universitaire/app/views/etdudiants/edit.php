<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Étudiant</title>
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
            margin: 20px 0;
            font-size: 28px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
            margin-right: 10px;
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
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Modifier un Étudiant</h1>

    <?php
    require_once(__DIR__ . '/../../database.php');

    $id = $nom = $prenom = $filiere = $email = "";

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM etudiants WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $etudiant = mysqli_fetch_assoc($result);
            $nom = $etudiant['nom'];
            $prenom = $etudiant['prenom'];
            $filiere = $etudiant['filiere'];
            $email = $etudiant['email'];
        } else {
            echo "<p>Étudiant introuvable.</p>";
            exit;
        }
    } else {
        echo "<p>Aucun ID fourni pour modifier un étudiant.</p>";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $filiere = mysqli_real_escape_string($conn, $_POST['filiere']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        if (empty($nom) || empty($prenom) || empty($filiere) || empty($email)) {
            echo "<p>Tous les champs sont obligatoires.</p>";
        } else {
            $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom', filiere='$filiere', email='$email' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
                echo "<p style='color: green;'>Étudiant modifié avec succès !</p>";
            } else {
                echo "<p>Erreur : " . mysqli_error($conn) . "</p>";
            }
        }
    }
    ?>

    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($prenom) ?>" required>

        <label for="filiere">Filière :</label>
        <input type="text" id="filiere" name="filiere" value="<?= htmlspecialchars($filiere) ?>" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

        <button type="submit">Modifier Étudiant</button>
        <button><a href="index.php">Retour à la liste</a></button>
    </form>
</body>
</html>
