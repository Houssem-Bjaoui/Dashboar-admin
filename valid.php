<?php
include("functions.php");

$iduser =$_GET['id'];
// Connexion à la base de données
$conn=connect();

$requette = "UPDATE users SET Etat=1 WHERE id ='$iduser'";
$result = $conn ->query($requette);
if ($result){
header('location:users.php?valider=ok');
}
else{
    echo "Erreur de validation";

}
?>