<?php 
include_once "../includes/sidebar.php";
include_once "../classes/Member.class.php";
$membres = Member::allMember();
?>

<main>
    <!-- Bootstrap Tables -->
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-12">
                      
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <!-- Table -->
                <table id="example" class="table table-striped">
                    <!-- Table head -->
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">nom complet</th>
                            <th scope="col">cin</th>
                            <th scope="col">adress</th>
                            <th scope="col">date naissance</th>
                            <th scope="col">TEL</th>
                            <th scope="col">genre</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($membres as $v) { ?>
                        <tr>
                            <th scope="row"><?=$v['Member_id']?></th>
                            <td><?=$v['Nom_complet']?></td>
                            <td><?=$v['Cin']?></td>
                            <td><?=$v['Adress']?></td>
                            <td><?=$v['Date_naissance']?></td>
                            <td><?=$v['Tel']?></td>
                            <td><?=$v['Genre']?></td>
                            
                            <td>
                            <a href="../actions/supprimer.php?id=<?=$v['Member_id']?>" class="btn btn-danger" >Suprimmer</a>                              
                              <a href="modifier_member.php?id=<?=$v['Member_id']?>" class="btn btn-warning" >Modifier</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <!-- Table body -->
                </table>
                <!-- Table -->
            </div>
        </div>
    </div>
    <!-- Bootstrap Tables -->
</main>

<!-- Bootstrap 5 JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery 3.6.0 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
<?php include_once"../includes/footer.php";?>
