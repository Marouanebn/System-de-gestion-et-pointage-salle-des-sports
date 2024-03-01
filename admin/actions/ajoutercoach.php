<?php 
include_once "../classes/coach.class.php";
include_once "../classes/historique.class.php";

extract($_POST);
try {
    //code...
    $coach = new coach($Nom_complet,$Cin,$tel);
    $coach ->ajouter_coach();

    $historique = new historique("ajouter","vous avez ajouter coach ".$Nom_complet);
    $historique->ajouter_historique();
    header("location:../pages/ajouterseance.php");

} catch (\Throwable $th) {
    //throw $th;
    echo "An error occurred: ", $th->getMessage(), "\n";
}





?>