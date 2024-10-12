<?php
// récupération des données de formulaire 
session_start();
$id= $_POST['ida'];
$nomhotel= $_POST['nom'];
$pays= $_POST['pays'];





//connexion DB
include "functions.php";

$conn=connect();
 //Requette

 $requette= "UPDATE airlines SET  airline='$nomhotel' , country='$pays' WHERE id='$id'";

$result=$conn ->query($requette);
if($result){
    header('location:airlines_list.php?edit=ok');
}
?>