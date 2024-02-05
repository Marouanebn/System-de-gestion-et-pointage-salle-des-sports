<?php 


class connexion{


 




  public   static function connecter_db()
  {
      try {
          $cnx = new PDO('mysql:host=localhost;dbname=lifestylebd', "root", "");

          return $cnx;
      } catch (\Throwable $th) {
          echo "Erreur de connexion base de donnees ";
      }
}
public    function supprimer($id,$table)
{

    try {
        //connexion a la bd
        $cnx = connexion::connecter_db();
        //prepare SQL
        $rp = $cnx->prepare("delete from $table where id=?");
        //exercute 
        $rp->execute([$id]);
    } catch (\Throwable $th) {
        echo "Erreur de suppression d'un employe " . $th->getMessage();
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
public static function number_subscription() {
    try {
        $cnx = self::connecter_db();
        $rp = $cnx->query("SELECT
        YEAR(date_inscription) AS subscription_year,
        MONTHNAME(date_inscription) AS subscription_month,
        COUNT(*) AS number_of_subscriptions
    FROM
        subscription
    GROUP BY
        subscription_year, subscription_month
    ORDER BY
        subscription_year DESC, subscription_month DESC;");
        return $rp->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

public static function find($id,$table) {
    try {
    $cnx= connexion::connecter_db();
       $rp= $cnx->prepare("select * from $table where id=?");
       $rp->execute([$id]);
       $resultat=$rp->fetch();
       return $resultat;

    } catch (\Throwable $th) {
        echo "Erreur dans find membre ".$th->getMessage();
    }
    
    }
    public static function all($table) {
        try {
        $cnx= connexion::connecter_db();
           $rp= $cnx->prepare("select * from $table");
           $rp->execute();
           $resultat=$rp->fetchAll();
           return $resultat;
    
        } catch (\Throwable $th) {
            echo "Erreur de selection des membres ".$th->getMessage();
        }
        
        }
        
    

}

?>