<?php
// récupération des données de formulaire 
session_start();
$id = $_POST['idv'];
$airline = $_POST['airline'];
$depart = $_POST['depart'];
$arrive = $_POST['arrive'];
$date_depart = $_POST['date'];
$heure_depart = $_POST['heure'];
$duree_vol = $_POST['duree'];
$classe = $_POST['classe'];
$tarif = $_POST['tarif'];

//connexion DB
include "functions.php";
$conn = connect();

//Requete
$date_depart_format = date('Y-m-d H:i:s', strtotime($date_depart));
$heure_depart_format = date('H:i:s', strtotime($heure_depart));

// SQL Query with corrected variables
$requete = "UPDATE vols SET airline='$airline', depart='$depart', arrive='$arrive', date_de_depart='$date_depart_format', heure_de_depart='$heure_depart_format', durée_de_vol='$duree_vol', classe='$classe', Tarif='$tarif' WHERE id_vol='$id'";

$result = $conn->query($requete);
if ($result) {
    header('location:vols_list.php?edit=ok');
}
?>
