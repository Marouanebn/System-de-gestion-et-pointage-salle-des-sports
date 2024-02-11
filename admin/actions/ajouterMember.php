<?php

include_once '../classes/connexion.class.php';
include_once '../classes/member.class.php';
include_once '../classes/subcribtion.class.php';
include_once '../classes/payment.class.php';


function ajouterMember(){
    extract($_POST);
try {
    $member = new member($Nom_complet, $Cin, $Adress, $Date_naissance, $Tel, $Genre);

    $member_id = $member->AjouterMembre();
    
    
    if ($member_id) {
            $subcribtion = new subcribtion( $Date_inscription, $Durée_mois,$member_id);
            $Subcribtion_id= $subcribtion->Ajoutersubscription();
            
            if ($subcribtion) {
                $payment = new payment($Subcribtion_id,$Date_inscription,"payée",200);
                $payment->AjouterPayment();
                
                header("location:../add_member.php");
              
        } else {
            throw new Exception('Failed to add payment');
        }
    } else {
        throw new Exception('Failed to add member');
    }
   
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
}
$mem=ajouterMember();
?>