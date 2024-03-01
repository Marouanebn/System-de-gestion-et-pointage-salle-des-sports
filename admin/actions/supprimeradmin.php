<?php 

include_once "../classes/connexion.class.php";
include_once "../classes/historique.class.php";

extract($_GET);


$admin = connexion::supprimer($id);
# code...
// $historique = new historique("supprimer","Vous avez supprimer".$admin);
// $historique -> ajouter_historique();
header("location:../pages/add_admin.php");
 


?>