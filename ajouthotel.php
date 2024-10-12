<?php
// récuoération des données de formulaire 
session_start();
$nomhotel= $_POST['nom'];
$ville= $_POST['ville'];
$pays= $_POST['pays'];
$etoile = $_POST['etoile'];


//connexion DB
include "functions.php";

$conn=connect();
 //Requette

 $requette= "INSERT INTO hotels(Nom_hotel,Ville,Pays,Etoiles) 
 VALUES ('$nomhotel','$ville','$pays','$etoile')";

$result=$conn ->query($requette);
if($result){
    header('location:hotel_list.php');
}
?>