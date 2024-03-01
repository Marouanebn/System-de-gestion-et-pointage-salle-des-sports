<?php 
// include_once"includes/sidebar.php";
include_once"../includes/loginchecks.php";
include_once "../includes/sidebar.php";
include_once "../classes/coach.class.php";

$detail= coach::afficher_coaching_detail();

//  print_r($detail);
?>


<style>
     div.dataTables_wrapper div.dataTables_length label {
    font-weight: normal;
    text-align: left;
    margin: 10px;
    white-space: nowrap;
}
</style>
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
  
<div class="text-center ">
        <h1>Table coaching seance</h1>
    </div>
  
  <div class="row py-5">
<?php

// Check if message exists in session variable
if(isset($_SESSION['message'])) {
    // Display message
    echo "<div>".$_SESSION['message']."</div>";

    // Clear session variable
    unset($_SESSION['message']);
}
?>  
    <div class="col-lg-12 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
          <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                
                <tr>
                  <th>member nom</th>
                  <th>coach nom</th>
                  <th>seance plannifier</th>
                  <th>montant</th>
                  <th>seance faite</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              
              foreach ($detail as $v) {
                
              ?>
                <tr>
                  <td><?=$v['member nom']?></td>
                  <td><?=$v['coach nom']?></td>
                  <td><?=$v['seance plannifier']?></td>
                  <td><?=$v['montant']?></td>
                  <td><?=$v['seance faite']?></td>
                  <td>
                    <a href="../actions/effectuerseance.php?id=<?=$v['id']?>&seanceplan=<?=$v['seance plannifier']?>&seancefaite=<?=$v['seance faite']?>" class="btn btn-success">seance fait</a></td>

                </tr>
                <?php }?>
              </tbody>
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