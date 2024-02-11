<?php 
// include_once"includes/sidebar.php";
include_once 'classes/payment.class.php';
$payment= Payment::AfficherNonPayée();
// echo print_r($payment);
include_once "includes/sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+soRrYVK5KNHhOO8NwS+V4MIaPcXOELqM72vF4IH2b1Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-PpLhx+kvvpBNTVZlIM+u+26o9wf5wTkQEl3xIpO+ylXm5Gw7z+Wl+2PzTc41pM8lFXXxk2SY/DjF6vqhrl5W5A==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-PpLhx+kvvpBNTVZlIM+u+26o9wf5wTkQEl3xIpO+ylXm5Gw7z+Wl+2PzTc41pM8lFXXxk2SY/DjF6vqhrl5W5A==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script>$(function() {
    $(document).ready(function() {
      $('#example').DataTable();
    });
  });</script>
</head>
<body>
  <div class="container py-5">
    
    <div class="row py-5">
      <div class="col-lg-10 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-5 bg-white rounded">
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered">
                <thead>

                  <tr>
                    <th>Nom_complet</th>
                    <th>Date_inscription</th>
                    <th>Durée_mois</th>
                    <th>status</th>
                    <th>Date_payment</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <?php  foreach ($payment as $v) {
                    if($v['status']== " payeé"){
$color = "success";

                    }else{$color = "danger";}
                ?>
                <tbody>

                  <tr>
                    <td><?=$v['Nom_complet']?></td>
                    <td><?=$v['Date_inscription']?></td>
                    <td><?=$v['Durée_mois']?></td>
                    <td class="btn btn-<?=$color?>"><?=$v['status']?></td>
                    <td><?=$v['Date_payment']?></td>
                    <td > <a href="actions/effectuerpayment.php?id=<?=$v['Payment_id']?>" class="btn btn-success" >payeé</a></td>
                 
                  </tr>
                 
                </tbody>
                <?php }?>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>