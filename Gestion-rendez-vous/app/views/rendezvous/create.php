<?php
require_once(__DIR__ . '/../../database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'] ?? null;
    $heure = $_POST['heure'] ?? null;
    $description = $_POST['description'] ?? null;
    $client = $_POST['client'] ?? null;

    if (!$date || !$heure || !$client) {
        $errors = [];
        if (!$date) $errors[] = "'date'";
        if (!$heure) $errors[] = "'heure'";
        if (!$client) $errors[] = "'client'";

        die("Erreur : Les champs " . implode(", ", $errors) . " sont obligatoires !");
    }

    try {
        $stmt = $pdo->prepare("
            INSERT INTO rendezvous (date, heure, description, client)
            VALUES (:date, :heure, :description, :client)
        ");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':heure', $heure);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':client', $client);
        $stmt->execute();

        echo "<p style='color: green;'>Rendez-vous ajouté avec succès !</p>";
        echo "<a href='index.php'>Retour à la liste des rendez-vous</a>";
        exit;
    } catch (PDOException $e) {
        die("Erreur lors de l'ajout : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un rendez-vous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 5px;
            display: inline-block;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 1.1rem;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .success-message {
            color: green;
            font-size: 1.2rem;
            text-align: center;
            margin-top: 20px;
        }

        .return-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
        }

        .return-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter un rendez-vous</h1>
        <form method="POST">
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required><br>

            <label for="heure">Heure :</label>
            <input type="time" id="heure" name="heure" required><br>

            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4" placeholder="Entrez une description (facultatif)"></textarea><br>

            <label for="client">Client :</label>
            <input type="text" id="client" name="client" placeholder="Nom du client" required><br>

            <button type="submit">Planifier le rendez-vous</button>
        </form>
        <div class="success-message">
            <?php
            if (isset($successMessage)) {
                echo $successMessage;
            }
            ?>
        </div>
        <a href="index.php" class="return-link">Retour à la liste des rendez-vous</a>
    </div>
</body>
</html>
