<?php 




include_once '../classes/member.class.php';
include_once '../classes/subcribtion.class.php';
include_once '../classes/historique.class.php';



extract($_POST);
try {
    $member = new member($Nom_complet, $Cin, $Adress, $Date_naissance, $Tel, $Genre);
  $member_nom = $member->ModifierMembre($id);

    if ($member) {
        $subcribtion = new subcribtion($Date_inscription, $Durée_mois, $member_id);
        $Subcribtion_id = $subcribtion->Modifiersubscription($id);

       
            $historique = new historique("modifer","modifier $Nom_complet");
            $historique->ajouter_historique();
            header("location:../pages/table_member.php");
            exit; // Exit to prevent further execution
        
    } else {
        throw new Exception('Failed to add member');
    }
} catch (Exception $e) {
    
    throw new Exception('Failed to add member');
   
    exit; // Exit to prevent further execution
}
?>



