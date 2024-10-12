<?php
// récupération des données de formulaire 
session_start();

$airline= $_POST['airline'];
$depart= $_POST['depart'];
$arrive=$_POST['arrive'];
$date_depart=$_POST['date'];
$heure_depart=$_POST['heure'];
$duree_vol=$_POST['duree'];
$classe=$_POST['classe'];
$tarif=$_POST['tarif'];





include "functions.php";

$conn=connect();
 //Requette

 $requette= "INSERT INTO vols(airline, depart, arrive , `date de depart`, `heure de depart` , `durée de vol` , classe , Tarif) 
 VALUES ('$airline','$depart','$arrive','$date_depart','$heure_depart','$duree_vol','$classe','$tarif')";

 
 

$result=$conn ->query($requette);
if($result){
    header('location:vols_list.php?ajout=ok');
}
?>