<?php

include_once '../classes/connexion.class.php';
include_once '../classes/member.class.php';
include_once '../classes/subcribtion.class.php';

extract($_POST);

$member = new member($Nom_complet,$Cin,$Adress,$Date_naissance,$Tel,$Genre);

$member->AjouterMembre();
$subcribtion = new subcribtion($Date_inscription,$Durée_mois);
$subcribtion->Ajoutersubscription();


?>