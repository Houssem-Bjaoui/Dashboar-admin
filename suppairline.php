<?php


$idair =$_GET['idh'];

include "functions.php";

// Connexion à la base de données
$conn=connect();


$requette = "DELETE FROM airlines WHERE id='$idair'";
$resultat = $conn->query($requette);
if($resultat){
    
    header ('location:airlines_list.php?delete=ok');

}

?>