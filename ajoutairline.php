<?php
// récuoération des données de formulaire 
session_start();
$nomairline= $_POST['nom'];
$country=$_POST['pays']; 


//connexion DB
include "functions.php";

$conn=connect();
 //Requette

 $requette= "INSERT INTO airlines(airline,country) 
 VALUES ('$nomairline','$country')";

$result=$conn ->query($requette);
if($result){
    header('location:airlines_list.php');
}
?>