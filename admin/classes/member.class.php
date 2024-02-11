<?php 
include_once "connexion.class.php";
class member{
    //data 
    public $Nom_complet;
    public $Cin;
    public $Adress;
    public $Date_naissance;
    public $Tel; 
    public $Genre;
    
    //methodes
    //
    function __construct($Nom_complet,$Cin,$Adress,$Date_naissance,$Tel,$Genre) { 
       $this->Nom_complet=$Nom_complet;
       $this->Cin=$Cin;
       $this->Adress=$Adress;
       $this->Date_naissance=$Date_naissance;
       $this->Tel=$Tel;
       $this->Genre=$Genre;
    }
    
    //une methode pour  ajouter un employe dans la bd : 
    public function AjouterMembre() {
        try {
           //connection db
           $cnx= connexion::connecter_db();
           //preparer une requete SQL 
           $rp= $cnx->prepare("insert into member(Nom_complet, Cin, Adress, Date_naissance, Tel, Genre) values(?,?,?,?,?,?)");
           //execution
           $rp->execute([$this->Nom_complet,$this->Cin,$this->Adress,$this->Date_naissance,$this->Tel,$this->Genre]);
           
           // Return the ID of the newly inserted member
           return $cnx->lastInsertId();
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
          $rp= $cnx->prepare("update member set Nom_complet=?,Cin=?, Adress=?, Date_naissance=?, Tel=?, Genre=? where id=?");
           //execution
       $rp->execute([$this->Nom_complet,$this->Cin,$this->Adress,$this->Date_naissance,$this->Tel,$this->Genre,$id]);
    } catch (\Throwable $th) {
        echo "Erreur de modification d'un employe ".$th->getMessage();
    }
    
    }
   
    static public function getmember($Nom_complet=""){
        try {
            $cnx = connexion::connecter_db();
            $rp = $cnx->prepare("select m.* from member   where Nom_complet like ? 

            ");
            $rp->execute(["%$Nom_complet%","%$Nom_complet%"]);
            return $rp->fetchAll();
        } catch (\Throwable $th) {
            echo "Erreur recherche avec leurs departements " . $th->getMessage();
        }
    }
   
}
    
       
    
    






?>