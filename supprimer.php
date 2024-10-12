<?php
//echo "Id de hotel".$_GET['idh'];

$idhotel =$_GET['idh'];

include "functions.php";

// Connexion à la base de données
$conn=connect();


$requette = "DELETE FROM hotels WHERE id='$idhotel'";
$resultat = $conn->query($requette);
if($resultat){
    //echo "hotel supprimer";
    header ('location:hotel_list.php?delete=ok');

}

?>