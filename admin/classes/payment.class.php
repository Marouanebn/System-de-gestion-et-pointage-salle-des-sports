
<?php
include_once 'connexion.class.php';
include_once 'member.class.php';
include_once 'subcribtion.class.php';
class Payment {
    public $status;
    public $Montant;
    public $Date_payment;
    public $expire_date;
    public $Subscribtion_id;

    public function __construct($Subscribtion_id, $Date_payment) {
        $this->Montant = 200;
        $this->Date_payment = $Date_payment;
        $this->expire_date = date('Y-m-d', strtotime($this->Date_payment. ' + 1 month'));
        if (strtotime($this->expire_date) <= strtotime(date('Y-m-d'))){
            $this->status = "non payée";
        } else {
            $this->status = "payée";
        }
        
        $this->Subscribtion_id = $Subscribtion_id; 
    }
    

    public function AjouterPayment() {
       
       
      


        try {
            // Connection to the database
            $cnx = connexion::connecter_db();
           
                // Prepare SQL query
                $rp = $cnx->prepare("INSERT INTO payment(status, Montant, Date_payment,expired_date,Subscribtion_id) VALUES (?,?,?,?,?)");
                
                // Execution
                $rp->execute([$this->status, $this->Montant, $this->Date_payment, $this->expire_date,$this->Subscribtion_id]);
                
                $lastInsertedId = $cnx->lastInsertId();
                return array("lastInsertedId" => $lastInsertedId, "expiryDate" => $this->expire_date);            } catch (\Throwable $th) {
                // Handle errors
                echo "Error adding a payment: " . $th->getMessage();
            }
        
        }
   static public function AfficherNonPayée() {
        try {
            // Connection to the database
            $cnx = connexion::connecter_db();
            
            // Prepare SQL query
            $rp = $cnx->prepare("SELECT m.Nom_complet, m.adress as 'email',s.Date_inscription, s.Durée_mois ,p.Date_payment,p.Payment_id ,p.status
            FROM member m
            JOIN subscription s ON m.Member_id = s.Member_id
            JOIN payment p ON p.Subscribtion_id = s.Subscription_id
            WHERE p.Status = 'non payée';");
            // Execution
            $rp->execute();
            $resultat=$rp->fetchAll();
            return $resultat;
     
            

        } catch (\Throwable $th) {
            // Handle errors
            echo "Error adding a payment: " . $th->getMessage();
        }
    }
   static public function effectuer_payment($Payment_id) {
        try {
            // Connection to the database
            $cnx = connexion::connecter_db();
            
            // Prepare SQL query
            $rp = $cnx->prepare("UPDATE payment SET status = 'payeé' , Date_payment = CURRENT_DATE WHERE Payment_id=?;");
            // Execution
            $rp->execute([$Payment_id]);
            $rp2 = $cnx->prepare("select expired_date from payment WHERE Payment_id=?;");
            $rp2->execute([$Payment_id]);
            
            $all=$rp2->fetch();
            $str = implode(',', $all);
            return $str;
     
     
            

        } catch (\Throwable $th) {
            // Handle errors
            echo "Error adding a payment: " . $th->getMessage();
        }
    }
static function  CalculerMontantParMois(){


  try {
            // Connection to the database
            $cnx = connexion::connecter_db();
            
            // Prepare SQL query
            $rp = $cnx->prepare("
            SELECT
            SUM(Montant) as 'Montant', MONTHNAME(Date_payment) as mois
        FROM
            payment
        WHERE
            STATUS = 'payeé'
            AND MONTHNAME(Date_payment) = MONTHNAME(CURRENT_DATE)
            AND YEAR(Date_payment) = YEAR(CURRENT_DATE)
        GROUP BY
            MONTHNAME(Date_payment);");
            // Execution
            $rp->execute();

            // Fetch results
            return $rp->fetchAll(PDO::FETCH_ASSOC);
     
     
            

        } catch (\Throwable $th) {
            // Handle errors
            echo "Error adding a payment: " . $th->getMessage();
        }

}
    

    
}
?>