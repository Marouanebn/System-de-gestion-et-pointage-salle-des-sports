<?php 
include_once "../classes/coach.class.php";


extract($_GET);
// print_r($_GET);
if ($_GET['seanceplan'] <= $_GET['seancefaite']) {
    session_start();

    // Process your form submission or perform your action here
    
    // Set message in session variable
    $_SESSION['message'] = "<div class=\"alert alert-danger container col-lg-10 d-flex align-items-center\" role=\"alert\">
   
    <div>
vous avez  plannifier seulement ".$_GET['seanceplan']." seance  </div>
  </div>";
    
    // Redirect to the same page
    header("Location:../pages/clientcoach.php");
    exit;

    //    echo "error";
}
else {
    coach::effectuer_seance($id);
    header("Location:../pages/clientcoach.php");
}
    
    ?>