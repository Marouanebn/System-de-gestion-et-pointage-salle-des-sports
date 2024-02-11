<?php 
include_once '../classes/payment.class.php';

$id=$_GET['id'];

Payment::effectuer_payment($id);






?>