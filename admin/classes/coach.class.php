<?php 
include_once "connexion.class.php";

class coach {


    public $coach_nom;
public $cin;
public $tel;
function __construct($coach_nom ,$cin ,$tel)
{
    $this->coach_nom = $coach_nom;
    $this->cin = $cin;
    $this->tel = $tel;

}

function ajouter_coach(){

    try {
        $cnx = connexion::connecter_db();
        
        $rp = $cnx->prepare("insert into coach(Nom_complet,Cin,Tel) values(?,?,?,?)");
        
        $rp ->execute([$this->coach_nom,$this->cin,$this->tel]);
        
    }
        //code...
     catch (\Throwable $th) {
    echo "error ajouter coach: " . $th->getMessage(); 
    
    
    }    }
static function ajouter_seance($member_id,$coach_id,$num_seance,$montant,$date_coach){

 try {
    $cnx = connexion::connecter_db();
    $date_coach = $date_coach->format('Y-m-d');
    $rp = $cnx->prepare("insert into coaching_seance(member_id,coach_id,num_seance,date_coach,montant) values(?,?,?,?,?)");
    $rp->execute([$member_id,$coach_id,$num_seance,$date_coach,$montant]);
    
    if($rp){
        $cnx = connexion::connecter_db();
        
        $rp2 = $cnx->prepare("select m.Nom_complet as 'member_nom', c.Nom_complet as 'coach_nom' FROM coaching_seance JOIN member m ON coaching_seance.member_id = m.Member_id JOIN coach c on coaching_seance.coach_id = c.coach_id where m.Member_id = ? and c.coach_id = ?;");
        $rp2->execute([$member_id,$coach_id]);
    }
    $resultat=$rp2->fetchAll();
    return $resultat;

 } catch (\Throwable $th) {
    echo "Error dajouter un seance".$th->getMessage();
 }


}

static function afficher_coach(){

    try {
        //code...
        $cnx = connexion::connecter_db();
    $rp = $cnx -> prepare("select Nom_complet , coach_id from coach");
    $rp -> execute ([]);
    return $rp->fetchAll();
    } catch (\Throwable $th) {
        //throw $th;

    echo "error adding seance".$th->getMessage() ;
    }
    
}
}













?>