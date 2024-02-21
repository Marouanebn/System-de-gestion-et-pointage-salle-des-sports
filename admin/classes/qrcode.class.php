<?php 
include_once "connexion.class.php";
require_once '../libarary/phpqrcode/qrlib.php';





class qrcodegenerator {
    public $path;
    public $qrcode;
    public $qrimage;
    public $payment_id;
    public $qrtext;
    
    function __construct($Nom_complet, $qrtext, $payment_id) {
        $this->path = '../img/qrcodeimg/';
        $this->qrcode = $this->path . $Nom_complet . time() . ".png"; // Adjust the filename for uniqueness
        $this->qrimage = time() . $Nom_complet . ".png";
        $this->payment_id = $payment_id;
        $this->qrtext = $qrtext;
    }
    function ajouter_qrcode() {
        try {
            // Connection to the database
            $cnx = connexion::connecter_db();
           
            // Prepare SQL query
            $rp = $cnx->prepare("INSERT INTO qrcode (qrcode_info, qrcode_image, id_payment) VALUES (?, ?, ?)");
            
            // Execution
            $rp->execute([$this->qrtext,  $this->qrimage, $this->payment_id]);
            
            // Check if insertion was successful before generating and saving the QR code image
            if ($rp->rowCount() > 0) {
               QRcode::png($this->qrtext, $this->qrcode, 'H', 5, 5);
               return $this->qrcode; // Return the path to the generated QR code image
            } else {
                echo "Failed to insert data into the database.";
            }
                
        } catch (\Throwable $th) {
            // Handle errors
            echo "Error adding a qrcode: " . $th->getMessage();
        }
    }
    
}
