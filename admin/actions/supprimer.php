<?php 
include_once "../classes/member.class.php";
include_once "../classes/historique.class.php";

$id=$_GET['id'];

try {
    
   $sup = member::supprimer($id,"member");
  
       # code...
       $historique = new historique("supprimer" , "supprimer $sup");
       $historique -> ajouter_historique();
     
       header("location:../pages/table_member.php");
   
  

    
   




}catch (\Throwable $th) {
    // Handle errors
    echo "Error siprimmer a member: " . $th->getMessage();
}


?>