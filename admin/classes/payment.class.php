
<?php
include_once '../classes/connexion.class.php';
include_once '../classes/member.class.php';
include_once '../classes/subcribtion.class.php';
class Payment {
    public $status;
    public $Montant;
    public $Date_payment;
    public $Subscribtion_id;

    public function __construct($Subscribtion_id,$status="payée", $Montant=200) {
        $this->status = $status;
        $this->Montant = $Montant;
       
        $this->Date_payment = new DateTime();
        $this->Subscribtion_id = $Subscribtion_id; 
    }

    public function AjouterPayment() {
        try {
            // Connection to the database
            $cnx = connexion::connecter_db();
            
            // Prepare SQL query
            $rp = $cnx->prepare("INSERT INTO payment(status, Montant, Date_payment,Subscribtion_id) VALUES (?,?,?,?)");
            $formattedDate = $this->Date_payment->format('Y-m-d H:i:s');
            // Execution
            $rp->execute([$this->status, $this->Montant, $formattedDate, $this->Subscribtion_id]);
            

        } catch (\Throwable $th) {
            // Handle errors
            echo "Error adding a payment: " . $th->getMessage();
        }
    }
    
}
?>