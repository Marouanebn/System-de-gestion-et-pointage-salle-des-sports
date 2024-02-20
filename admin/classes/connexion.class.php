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
    }



?>