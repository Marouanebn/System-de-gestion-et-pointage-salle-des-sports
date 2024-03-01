<?php 


class connexion{

private static $host="localhost";
private static $dbname= "lifestylebd";
private static $username ="root";
private static $password ="";

 
public   static function connecter_db()
  {
      try {
          $cnx = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname, self::$username,self::$password);

          return $cnx;
      } catch (\Throwable $th) {
          echo "Erreur de connexion base de donnees ";
      }
}

public static function count_genre() {
    try {
        $cnx = self::connecter_db();
        $rp = $cnx->query("SELECT genre, COUNT(*) AS nombre_genre FROM member GROUP BY genre");
        return $rp->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}
static public function supprimer($id)
{
    try {
        // Connect to the database
        $cnx = connexion::connecter_db();

        // Prepare SQL to select member
//         $rp = $cnx->prepare("SELECT username FROM login WHERE id=?");
//         $rp->execute([$id]);
//         $member = $rp->fetch();
// return $member['username'];
     
            $rp = $cnx->prepare("DELETE FROM login WHERE id=?");
            $rp->execute([$id]);
        
    } catch (\Throwable $th) {
        echo "Erreur de suppression d'un admin " . $th->getMessage();
    }
}
public static function find($id , $table) {
    try {
    $cnx= connexion::connecter_db();
       $rp= $cnx->prepare("select * from $table where id=?");
       $rp->execute([$id]);
       $resultat=$rp->fetch();
       return $resultat;

    } catch (\Throwable $th) {
        echo "Erreur dans find admin ".$th->getMessage();
    }
    
    }
static public function Modifieradmin($id,$username,$password) {
    try {
           //connection db
           $cnx= connexion::connecter_db();

//preparer une requete SQL 
$rp2= $cnx->prepare("update login set username = ?,password = ? where id=?");
//execution
$rp2->execute([$username,$password,$id]);


   
    } catch (\Throwable $th) {
        echo "Erreur de modification d'un admin ".$th->getMessage();
    }
    
    }

  
        
    static function totalMemberActive(){

        try {
            $cnx= connexion::connecter_db();
               $rp= $cnx->prepare("SELECT COUNT(DISTINCT CASE WHEN p.STATUS = 'payeé' THEN m.Member_id END) as TotalPayee, COUNT(DISTINCT CASE WHEN p.STATUS = 'non payée' THEN m.Member_id END) as TotalNonPayee FROM member m JOIN subscription s ON m.Member_id = s.Member_id JOIN payment p ON s.Subscription_id = p.Subscribtion_id;");
               $rp->execute();
               $resultat=$rp->fetchAll();
               return $resultat;
        
            } catch (\Throwable $th) {
                echo "Erreur de selection des membres ".$th->getMessage();
            }
            
            }

            static function add_user($user,$pass){
                try {
                    $cnx= connexion::connecter_db();
                    //On prepare la requete
                    $rp = $cnx->prepare("insert into login(username,password) values(?,?)");
                    $rp ->execute([$user,$pass]);
                
                    //code...
                } catch (\Throwable $th) {
                    //throw $th;
                    echo "Erreur d'ajouter admin ".$th->getMessage();
                }


            }
            public static function alladmin() {
                try {
                $cnx= connexion::connecter_db();
                   $rp= $cnx->prepare("SELECT * FROM `login` ORDER BY `username` DESC");
                   $rp->execute();
                   $resultat=$rp->fetchAll();
                   return $resultat;
            
                } catch (\Throwable $th) {
                    echo "Erreur de selection des membres ".$th->getMessage();
                }
                
                }

    }



?>