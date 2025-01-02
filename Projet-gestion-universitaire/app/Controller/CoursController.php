<?php
require_once "../models/Cours.php";

class CoursController
{
    
    public function index()
    {
      //  $cours = Cours::getAll(); 
        require '../views/cours/index.php'; // Charge la vue pour afficher la liste cheminement
    }

}
?>