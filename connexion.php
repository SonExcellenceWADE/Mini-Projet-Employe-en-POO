<?php

function connect()
{
    $user="son excellence";
    $mdp=1993;
try {
    
    $con= new PDO("mysql:host=localhost; dbname=dbemp", $user, $mdp);
  //echo "connexion etablie avec succes";
} catch (PDOException $ex) {
    die("Impossible de se connecter avec la base de donnees".$ex->getMessage());
}
   return $con;
}
$con=connect();