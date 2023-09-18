<?php
  // Vérifie qu'il provient d'un formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //identifiants mysql
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "users";
    
    $nom = $_POST["nom"]; 
    $prenom = $_POST["prenom"];
    $age = $_POST["age"]; 

    if (!isset($nom)){
      die("entrez votre Nom");
    }
    if (!isset($prenom)){
      die("entrez votre Prénom");
    }
    if (!isset($age)){
        die("entrez votre âge");
      }  

    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($host, $username, $password, $database);
    
    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  
    
    //préparer la requête d'insertion SQL
    $statement = $mysqli->prepare("INSERT INTO users (nom, prenom, age) VALUES(?, ?, ?)"); 
    //Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param('ss', $nom, $prenom, $age); 
    
    if($statement->execute()){
      print "Salut " . $nom . "!, votre adresse prénom" est ". $prenom;
    }else{
      print $mysqli->error; 
    }
  }
?>
