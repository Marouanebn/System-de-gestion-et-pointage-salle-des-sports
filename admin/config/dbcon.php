<?php

    $host ="localhost";
    $user ="root";
    $pass ="";
    $db ="entreprise";


    try {
        $dbh = new PDO('mysql:host=localhost;dbname=entreprise', $user, $pass);
   
echo "cnx works";    } 
catch (PDOException $e) {
echo "erreur"   ; }
?>