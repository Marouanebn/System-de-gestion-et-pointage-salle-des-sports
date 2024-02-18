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
    
    // function GetLastMember(){
    //     try {
    //         $cnx= connexion::connecter_db();
    //            $rp= $cnx->prepare("SELECT Nom_complet FROM member ORDER BY Member_id DESC LIMIT 1;");
    //            $rp->execute([]);
    //            $resultat=$rp->fetchAll();
    //            echo json_encode($resultat);
        
    //         } catch (\Throwable $th) {
    //             echo "Erreur de selection des membres ".$th->getMessage();
    //         }
        
    // }
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
    public static function allMember() {
        try {
        $cnx= connexion::connecter_db();
           $rp= $cnx->prepare("SELECT * FROM `member` ORDER BY `member`.`Member_id` DESC");
           $rp->execute();
           $resultat=$rp->fetchAll();
           return $resultat;
    
        } catch (\Throwable $th) {
            echo "Erreur de selection des membres ".$th->getMessage();
        }
        
        }
        static public function supprimer($id)
        {
            try {
                // Connect to the database
                $cnx = connexion::connecter_db();
        
                // Prepare SQL to select member
                $rp = $cnx->prepare("SELECT nom_complet FROM member WHERE Member_id=?");
                $rp->execute([$id]);
                $member = $rp->fetch();
        
                // If member exists, delete and return nom_complet
                if ($member) {
                    $rp = $cnx->prepare("DELETE FROM member WHERE Member_id=?");
                    $rp->execute([$id]);
                    return $member['nom_complet'];
                } else {
                    return "Member not found";
                }
            } catch (\Throwable $th) {
                echo "Erreur de suppression d'un employe " . $th->getMessage();
            }
        }
        public static function find($id , $table) {
            try {
            $cnx= connexion::connecter_db();
               $rp= $cnx->prepare("select * from $table where Member_id=?");
               $rp->execute([$id]);
               $resultat=$rp->fetch();
               return $resultat;
        
            } catch (\Throwable $th) {
                echo "Erreur dans find membre ".$th->getMessage();
            }
            
            }
    //une methode pour  ajouter un employe dans la bd : 
    public function ModifierMembre($id) {
    try {
           //connection db
           $cnx= connexion::connecter_db();
           $rp = $cnx->prepare("SELECT Nom_complet FROM member WHERE Member_id=?");
           $rp->execute([$id]);
           $member = $rp->fetch();
   
           //preparer une requete SQL 
          $rp= $cnx->prepare("update member set Nom_complet=?,Cin=?, Adress=?, Date_naissance=?, Tel=?, Genre=? where Member_id=?");
           //execution
       $rp->execute([$this->Nom_complet,$this->Cin,$this->Adress,$this->Date_naissance,$this->Tel,$this->Genre,$id]);
      
         return $member['Nom_complet'];
   
    } catch (\Throwable $th) {
        echo "Erreur de modification d'un member ".$th->getMessage();
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