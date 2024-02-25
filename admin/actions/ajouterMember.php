<?php

include_once '../classes/member.class.php';
include_once '../classes/subcribtion.class.php';
include_once '../classes/payment.class.php';
include_once '../classes/historique.class.php';
include_once '../classes/qrcode.class.php';



extract($_POST);

try {
    $member = new member($Nom_complet, $Cin, $Adress, $Date_naissance, $Tel, $Genre);
    $member_id = $member->AjouterMembre();

    if ($member_id) {
        $subcribtion = new subcribtion($Date_inscription, $Durée_mois, $member_id);
        $Subcribtion_id = $subcribtion->Ajoutersubscription();

        if ($Subcribtion_id) {
            $payment = new payment($Subcribtion_id, $Date_inscription);
            $payment_id = $payment->AjouterPayment();
            if ($payment_id) {
                $info = $Nom_complet."<br>".$Date_inscription."" ;
                $qrcode = new qrcodegenerator($Nom_complet,$info,$payment_id);
                $qrcode = $qrcode->ajouter_qrcode();
                $mail = member::envoyer_mail($qrcode, $Adress,$Nom_complet,"new");

                //ajouter a Historique
                $historique = new historique("ajouter","ajouter $Nom_complet");
                $historique->ajouter_historique();

                header("location:../pages/add_member.php");
                exit; // Exit to prevent further execution
            }
                else {
                    # code...
                    throw new Exception('Failed to add qr code');
                }

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
