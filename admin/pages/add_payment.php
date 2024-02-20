<?php 
// include_once"includes/sidebar.php";
include_once '../classes/payment.class.php';
$payment= Payment::AfficherNonPayée();
// echo print_r($payment);
include_once "../includes/sidebar.php";
?>



<script>
  $(document).ready(function() {
    $('#example').DataTable({
      searching: true, // Enable search bar
      paging: true, // Enable pagination
      ordering: true, // Enable column sorting
      info: true // Enable table information display
    });
  });
</script>
<div class="container py-5">
  
  
  
  <div class="row py-5">
    <div class="container col-lg-10"><div class="alert alert-primary" role="alert">
    <i class='bx bx-info-circle pe-2' style='color:#0778cb'  ></i>cliquez sur le bouton payer pour effectuer le paiement</div></div>
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
              <?php foreach ($payment as $v) {
                  if($v['status'] == "payeé") {
                    $color = "success";
                  } else {
                    $color = "danger";
                  }
              ?>
              <tbody>
                <tr>
                  <td><?=$v['Nom_complet']?></td>
                  <td><?=$v['Date_inscription']?></td>
                  <td><?=$v['Durée_mois']?></td>
                  <td><span class="badge bg-<?=$color?> p-3"><?=$v['status']?></span></td>
                  <td><?=$v['Date_payment']?></td>
                  <td> <a href="../actions/effectuerpayment.php?id=<?=$v['Payment_id']?>" class="btn btn-success">Payer</a></td>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      searching: true, // Enable search bar
      paging: true, // Enable pagination
      ordering: true, // Enable column sorting
      info: true // Enable table information display
    });
  });
</script>
<?php  include_once"../includes/footer.php"; ?>