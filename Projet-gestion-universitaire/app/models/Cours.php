<?php

class Etudiant
{
    public $id;
    public $nom;
    public $prenom;
    public $filiere;
    public $email;

    public function __construct($id, $nom, $prenom, $filiere, $email)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->filiere = $filiere;
        $this->email = $email;
    }

    public static function getAll()
    {
        try {

            $pdo = new PDO('mysql:host=localhost;dbname=etudiants', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //  récupérer les étudiants
            $stmt = $pdo->query("SELECT * FROM etudiants");

            //  stocker les étudiants
            $etudiants = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $etudiants[] = new Etudiant(
                    $row['id'],
                    $row['nom'],
                    $row['prenom'],
                    $row['filiere'],
                    $row['email']
                );
            }

            return $etudiants;

        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            return [];
        }
    }
}
