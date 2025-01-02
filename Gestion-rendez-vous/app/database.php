<?php 
$dsn='mysql:host=localhost;dbname=bd_gestion_rdv';
$username='root';
$password='';

try
{
    $connexion = new PDO($dsn,$username,$password);
    echo"Connexion reussi a mysql avec PDO";
    $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $e) {
    echo"erreur de connexion: ".$e->getMessage();
}
?>