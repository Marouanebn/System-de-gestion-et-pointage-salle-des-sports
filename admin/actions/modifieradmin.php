<?php 

include_once "../classes/connexion.class.php";
include_once "../classes/historique.class.php";

extract($_POST);
$admin = connexion::Modifieradmin($id,$username,$password);
   # code... 
   
header("location:../pages/add_admin.php");

?>