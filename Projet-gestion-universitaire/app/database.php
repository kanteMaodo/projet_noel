<?php
$host = 'localhost'; // Nom du serveur
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL
$database = 'bd_etudiant'; // Nom de la base de données
$conn= new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $connection->connect_error);
}
echo "Connexion réussie.";

?>