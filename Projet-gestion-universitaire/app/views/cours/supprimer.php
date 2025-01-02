<?php
// Inclure le fichier de connexion à la base de données
require_once(__DIR__ . '/../../database.php');

// Vérifier si un ID est passé via l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Récupérer l'ID de l'étudiant

    // Requête SQL pour supprimer l'étudiant
    $sql = "DELETE FROM cours WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>Cours supprimé avec succès.</p>";
    } else {
        echo "<p style='color: red;'>Erreur : " . mysqli_error($conn) . "</p>";
    }

    // Rediriger vers la liste des étudiants après suppression
    header("Location: index.php");
    exit;
} else {
    echo "<p style='color: red;'>Aucun ID fourni pour la suppression.</p>";
}
?>
