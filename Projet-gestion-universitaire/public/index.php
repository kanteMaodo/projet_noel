<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion</title>
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
            margin-top: 50px;
            font-size: 2.5rem;
            color: #1d3557;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            text-align: center;
        }

        .link {
            display: inline-block;
            margin: 15px;
            padding: 15px 25px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .link:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #1d3557;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .link {
                padding: 12px 20px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <h1>Bienvenue à la Gestion</h1>
    <div class="container">
        <a href="etudiants/index.php" class="link">Gestion des Étudiants</a>
        <a href="cours/index.php" class="link">Gestion des Cours</a>
    </div>

    <div class="footer">
        &copy; 2025 Gestion des Ressources de l'univercite. Tous droits réservés.
    </div>
    
</body>
</html>
