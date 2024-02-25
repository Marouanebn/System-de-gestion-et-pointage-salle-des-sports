<?php 
include_once "../classes/coach.class.php";
include_once "../classes/historique.class.php";
extract($_POST);

try {
    //code...
    $date_coach = new DateTime();
    $coach = coach::ajouter_seance($nom_member,$nom_coach,$seance,$montant,$date_coach);
    print_r($coach);
    foreach ($coach as $v) {
        # code...
        $history = new historique("ajouter" , "vous avez ajouter une seance de ".$v['member_nom']." avec coach ".$v['coach_nom']);
        $history->ajouter_historique();
    }
    header("location:../pages/ajouterseance.php");
   


} catch (\Throwable $th) {
    //throw $th;
    echo "Error adding  une seance:".$th->getMessage();
}

?>