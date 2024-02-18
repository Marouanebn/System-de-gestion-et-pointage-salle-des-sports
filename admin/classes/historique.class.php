<?php 
include_once "connexion.class.php";


class historique {
public $action_type;
public $action_detail;



function __construct($action_type,$action_detail= "") {
	$this->action_type=$action_type;
    $this->action_detail=$action_detail;

    
}

function ajouter_historique(){
   try{ $cnx = connexion::connecter_db();
    
    $rp = $cnx-> prepare("insert into history_log (action_type,action_detail) values (?, ?)");
    
    $rp->execute([$this->action_type,$this->action_detail]);
   }catch(Exception $e){echo 'Erreur : '. $e->getMessage(). '<br>';}
    
    
}

static function afficher_historique(){
    try {$cnx = connexion::connecter_db();
    
    $rp = $cnx-> prepare("select * from history_log order by id desc ");
    
    $rp->execute([]);
    $resultat=$rp->fetchAll();
    return $resultat;
    }catch(Exception $e){return ['Erreur' => $e->getMessage()];}
}






}

// Usage






?>