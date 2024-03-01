<?php 
include_once '../classes/payment.class.php';
include_once '../classes/qrcode.class.php';
include_once '../classes/historique.class.php';

$id=$_GET['id'];
$Nom_complet = $_GET['Nom_complet'];
$email=$_GET['email'];
try {
    //code...
    //effectuer payment && return expired_date
    $expired_date=Payment::effectuer_payment($id);
    //generer le code qr du member qui a payer
    $info = "Nom Complet : ".$Nom_complet."Votre abonnement expire Le :".$expired_date."" ;
    $qrcode = new qrcodegenerator($Nom_complet,$info,$id);
    $qr_code=$qrcode ->qr_payment();
    //envoyer email a member
    $send_mail=member::envoyer_mail($qr_code,$email,$Nom_complet,"renew");
     //ajouter a Historique
     $historique = new historique("payment","effectuer un payment pour $Nom_complet");
     $historique->ajouter_historique();
    header("location:../pages/add_payment.php");
} catch (\Throwable $th) {
    //throw $th;
    echo "Erreur :".$th->getMessage()."<br>";
}






?>