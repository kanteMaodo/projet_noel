<?php
require_once "../models/Etudiant.php";
class EtudiantController
{
    // Affiche la liste des étudiants
    public function index()
    {
        $etudiants = Etudiant::getAll();
        require '../views/etudiants/index.php';
    }

 
}


?>