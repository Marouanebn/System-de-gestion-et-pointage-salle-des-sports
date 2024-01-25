<?php 
include_once "connexion.class.php";
class membre{
    //data 
    public $Nom_complet;
    public $Cin;
    public $Adress;
    public $Datenaissance;
    public $Tel; 
    public $Genre;
    public $Date_inscription;
    
    //methodes
    //
    function __construct($Nom_complet,$Cin,$Adress,$Datenaissance,$Tel,$Genre,$Date_inscription) { 
       $this->Nom_complet=$Nom_complet;
       $this->Cin=$Cin;
       $this->Adress=$Adress;
       $this->Datenaissance=$Datenaissance;
       $this->Tel=$Tel;
       $this->Genre=$Genre;
       $this->Date_inscription=$Date_inscription;
    }
    
    //une methode pour  ajouter un employe dans la bd : 
    public function AjouterMembre() {
    try {
           //connection db
           $cnx= connexion::connecter_db();
           //preparer une requete SQL 
          $rp= $cnx->prepare("insert into membre(Nom_complet, Cin, Adress, Datenaissance, Tel, Genre, date_inscription) values(?,?,?,?,?,?,?)"); //
           //execution
       $rp->execute([$this->Nom_complet,$this->Cin,$this->Adress,$this->Datenaissance,$this->Tel,$this->Genre,$this->Date_inscription]);
    } catch (\Throwable $th) {
        echo "Erreur d'ajout d'un membre ".$th->getMessage();
    }
    
    }
    //une methode pour  ajouter un employe dans la bd : 
    public function ModifierMembre($id) {
    try {
           //connection db
           $cnx= connexion::connecter_db();
           //preparer une requete SQL 
          $rp= $cnx->prepare("update membre set Nom_complet=?,Cin=?, Adress=?, Datenaissance=?, Tel=?, Genre=?, date_inscription=? where id=?");
           //execution
       $rp->execute([$this->Nom_complet,$this->Cin,$this->Adress,$this->Datenaissance,$this->Tel,$this->Genre,$this->Date_inscription,$id]);
    } catch (\Throwable $th) {
        echo "Erreur de modification d'un employe ".$th->getMessage();
    }
    
    }
   
   
    
       
    
    
}

class coach{

    public $Nom_complet;
    public $Cin;
    public $Adress;
    public $Datenaissance;
    public $Tel;





}





?>