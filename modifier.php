<?php
// récupération des données de formulaire 
session_start();
$id= $_POST['idh'];
$nomhotel= $_POST['nom'];
$ville= $_POST['ville'];
$pays= $_POST['pays'];
$etoile = $_POST['etoile'];




//connexion DB
include "functions.php";

$conn=connect();
 //Requette

 $requette= "UPDATE hotels SET  Nom_hotel='$nomhotel', Ville='$ville' , Pays='$pays', Etoiles='$etoile' WHERE id='$id'";

$result=$conn ->query($requette);
if($result){
    header('location:hotel_list.php?edit=ok');
}
?>