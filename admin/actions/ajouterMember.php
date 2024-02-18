<?php

include_once '../classes/member.class.php';
include_once '../classes/subcribtion.class.php';
include_once '../classes/payment.class.php';
include_once '../classes/historique.class.php';



extract($_POST);

try {
    $member = new member($Nom_complet, $Cin, $Adress, $Date_naissance, $Tel, $Genre);
    $member_id = $member->AjouterMembre();

    if ($member_id) {
        $subcribtion = new subcribtion($Date_inscription, $Durée_mois, $member_id);
        $Subcribtion_id = $subcribtion->Ajoutersubscription();

        if ($Subcribtion_id) {
            $payment = new payment($Subcribtion_id, $Date_inscription);
            $payment->AjouterPayment();
            $historique = new historique("ajouter","ajouter $Nom_complet");
            $historique->ajouter_historique();
            header("location:../add_member.php");
            exit; // Exit to prevent further execution
        } else {
            throw new Exception('Failed to add subscription');
        }
    } else {
        throw new Exception('Failed to add member');
    }
} catch (Exception $e) {
    
    throw new Exception('Failed to add member');
   
    exit; // Exit to prevent further execution
}
?>
