<?php 
include_once "connexion.class.php";
include_once "member.class.php";

class subcribtion{
    //data 
    public $Date_inscription;
    public $Durée_mois;

    
    //methodes
    //
    function __construct($Date_inscription,$Durée_mois) { 
     
       $this->Date_inscription=$Date_inscription;
       $this->Durée_mois=$Durée_mois;
      
    }
    
    //une methode pour  ajouter un employe dans la bd : 
    public function Ajoutersubscription() {
        try {
            //connection db
            $cnx = connexion::connecter_db();
            $member_id = $cnx->lastInsertId();

            
            //preparer une requete SQL 
            $rp = $cnx->prepare("INSERT INTO subscription(Date_inscription, Durée_mois,Member_id) VALUES (?,?, ?)");
            //execution
            $rp->execute([ $this->Date_inscription, $this->Durée_mois,$member_id]);
        } catch (\Throwable $th) {
            echo "Erreur d'ajout d'un subscription " . $th->getMessage();
        }
    }
    //une methode pour  ajouter un employe dans la bd : 
    public function Modifiersubscription($id) {
    try {
           //connection db
           $cnx= connexion::connecter_db();
           //preparer une requete SQL 
          $rp= $cnx->prepare("update subscription set Date_inscription=?, Durée_mois=? where id=?");
           //execution
       $rp->execute([$this->Date_inscription,$this->Durée_mois,$id]);
    } catch (\Throwable $th) {
        echo "Erreur de modification d'un employe ".$th->getMessage();
    }
    
    }
   
   
    
       
    
    
}







?>