<?php 

include_once "../classes/connexion.class.php";
include_once "../classes/historique.class.php";

extract($_POST);

try {
    
$admin = connexion::add_user($user,$pass);

$historique = new historique("ajouter", "vous avez ajouter admin ".$user);
$historique->ajouter_historique();
header("location:../pages/add_admin.php");


} catch (\Throwable $th) {
    //throw $th;
    echo "error dajouter admin : " . $th->getMessage();
}




?>