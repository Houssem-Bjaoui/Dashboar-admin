<?php


$idvol =$_GET['idv'];

include "functions.php";

// Connexion à la base de données
$conn=connect();


$requette = "DELETE FROM vols WHERE id_vol='$idvol'";
$resultat = $conn->query($requette);
if($resultat){
    
    header ('location:vols_list.php?delete=ok');

}

?>