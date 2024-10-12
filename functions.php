<?php
function connect(){
    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'agence_de_voyage');

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Could not connect to MySQL: " . $conn->connect_error);
    }

    return $conn;
}



function connectadmin($data){


  // Connexion à la base de données
  $conn=connect();

$name = $data['Name'];
$password = md5($data['password']);
$requette = "SELECT * FROM adminis WHERE Name='$name' AND password='$password'";

$resultat = $conn->query($requette);
$user = $resultat->fetch_assoc();
return $user;

}



function getusers(){
// Connexion à la base de données
$conn=connect();

$requette= "SELECT* FROM users WHERE Etat=0";
$resultat = $conn->query($requette);
$users = $resultat->fetch_all();
return $users;
}



function gethotels(){
  // Connexion à la base de données
  $conn=connect();
  
  $requette= "SELECT* FROM hotels ";
  $resultat = $conn->query($requette);
  $hotel = $resultat->fetch_all();
  return $hotel;
  }
  
///================MANAGE VOLS====================
  function getvols(){
    // Connexion à la base de données
    $conn=connect();
    
    $requette= "SELECT* FROM vols ";
    $resultat = $conn->query($requette);
    $vol = $resultat->fetch_all();
    return $vol;
    }
  
    ///================MANAGE airlines====================
  function getairlines(){
    // Connexion à la base de données
    $conn=connect();
    
    $requette= "SELECT* FROM Airlines ";
    $resultat = $conn->query($requette);
    $airline = $resultat->fetch_all();
    return $airline;
    }

// ============get information from DB=============//
    function getinfo(){

      $info = array();
      // Connexion à la base de données
    $conn=connect();

    $requette = "SELECT COUNT(*) FROM users";
     $resultat=$conn -> query($requette);
$nbclient= $resultat ->fetch_all();

     $requette1 = "SELECT COUNT(*) FROM Airlines";
     $resultat1=$conn -> query($requette1);
     $nbairline= $resultat1 ->fetch_all();
     
     $requette2 = "SELECT COUNT(*) FROM vols";
     $resultat2=$conn -> query($requette2);
     $nbvols= $resultat2 ->fetch_all();
     
     $requette3 = "SELECT COUNT(*) FROM hotels";
    $resultat3=$conn -> query($requette3);
     $nbhotels= $resultat3 ->fetch_all();

     $info["users"] =  $nbclient[0];

     $info["Airlines"] =  $nbairline[0];

     $info["vols"] =  $nbvols[0];

     $info["hotels"] =  $nbhotels[0];
     return $info;
     

    }
  
    function getclients(){
      // Connexion à la base de données
      $conn=connect();
      
      $requette= "SELECT* FROM users WHERE Etat=1";
      $resultat = $conn->query($requette);
      $client = $resultat->fetch_all();
      return $client;
      }
      

