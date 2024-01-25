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