<?php 
include_once "connexion.class.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require '../libarary/PHPMailer/vendor/autoload.php';
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
    static function envoyer_mail($qrcode, $address,$Nom_complet,$subject) {
        // Create a new PHPMailer instance
        // Define dimensions
$imageWidth = 500;
$imageHeight = 650;

// Create a new image with the specified width and height
$image = imagecreatetruecolor($imageWidth, $imageHeight);

// Set background color (white)
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $backgroundColor);

// Load the background image
$backgroundImagePath = '../img/membership.jpg'; // Update with your image path
$backgroundImage = imagecreatefromjpeg($backgroundImagePath);

// Get the dimensions of the background image
$bgImageWidth = imagesx($backgroundImage);
$bgImageHeight = imagesy($backgroundImage);

// Calculate the scale factor to fit the background image within the container
$scaleFactor = min($imageWidth / $bgImageWidth, $imageHeight / $bgImageHeight);

// Calculate the dimensions of the scaled background image
$scaledWidth = $bgImageWidth * $scaleFactor;
$scaledHeight = $bgImageHeight * $scaleFactor;

// Calculate the position to center the scaled background image
$offsetX = ($imageWidth - $scaledWidth) / 2;
$offsetY = ($imageHeight - $scaledHeight) / 2;

// Copy and resize the background image onto the canvas
imagecopyresampled($image, $backgroundImage, $offsetX, $offsetY, 0, 0, $scaledWidth, $scaledHeight, $bgImageWidth, $bgImageHeight);

// Load the QR code image
$qrCodeImagePath = $qrcode; // Update with your QR code image path
$qrCodeImage = imagecreatefrompng($qrCodeImagePath);

// Get the dimensions of the QR code image
$qrCodeWidth = 259;
$qrCodeHeight =232;
$resizedQrCode = imagescale($qrCodeImage, $qrCodeWidth, $qrCodeHeight);
// Calculate the position to place the QR code within the container
$qrCodeX = 125; // Update with the X position
$qrCodeY = 310; // Update with the Y position

// Copy the QR code image onto the canvas
imagecopy($image, $resizedQrCode, $qrCodeX, $qrCodeY , 0, 0, $qrCodeWidth, $qrCodeHeight);
// Save the image to a file
$outputImagePath = 'membership_card.png'; // Specify the output image path
imagepng($image, $outputImagePath);
        $mail = new PHPMailer(true);
    
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'hades7570@gmail.com';
            $mail->Password   = 'vhct npkr oitj acqn';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            
            // Recipients
            $mail->setFrom('hades7570@gmail.com', 'Lifestylefitness-direction');
            $mail->addAddress($address);
    
            // Get base64 encoded background image
            // $mail->addAttachment('../img/Ajouter un titre (1).jpg', 'background.jpg'); // Attach background image
            // $mail->addAttachment($qrcode, 'qrcode.png'); // Attach QR code image
            
            if ($subject == 'new') {
                # code...
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Your Membership Card';
                $mail->Body = '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
            <h1>Bonjour et bienvenue '.$Nom_complet.' a Lifestylefitness</h1>
               <p>Il faut scanner ce code QR à l\'entreé<p/>
               </body>
               </html>
               ';
            $mail->addAttachment($outputImagePath, 'membership_card.png');
            // Send the email
            $mail->send();
            echo 'Email sent successfully';
        }   else if ($subject == 'renew'){


            $mail->isHTML(true);
            $mail->Subject = 'votre nouvelle carte';
            $mail->Body = '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
        <h1>Bonjour '.$Nom_complet.' </h1>
        <p>Vous avez renouveller votre abonnement</p>
           <p>Il faut scanner ce code QR à l\'entreé<p/>
           </body>
           </html>
           ';
        $mail->addAttachment($outputImagePath, 'membership_card.png');
        // Send the email
        $mail->send();
        echo 'Email sent successfully';

        }
        } catch (Exception $e) {
            echo "Email sending failed: {$mail->ErrorInfo}";
        }
        
        
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
          $rp2= $cnx->prepare("update member set Nom_complet=?,Cin=?, Adress=?, Date_naissance=?, Tel=?, Genre=? where Member_id=?");
           //execution
       $rp2->execute([$this->Nom_complet,$this->Cin,$this->Adress,$this->Date_naissance,$this->Tel,$this->Genre,$id]);
      
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
    
    static public function afficher_nom_client(){
        try {
            $cnx = connexion::connecter_db();
            $rp = $cnx->prepare("select Nom_complet , Member_id FROM member;");

            
            $rp->execute([]);
            return $rp->fetchAll();
        } catch (\Throwable $th) {
            echo "Erreur recherche avec leurs departements " . $th->getMessage();
        }
    }

   
}
    
       
    
    






?>