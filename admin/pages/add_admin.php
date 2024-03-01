<?php
include_once"../includes/loginchecks.php";
include_once "../includes/sidebar.php";


include_once "../classes/connexion.class.php";
$admin = connexion::alladmin();


?>
<style>
    div.dataTables_wrapper div.dataTables_length label {
    font-weight: normal;
    text-align: left;
    margin: 10px;
    white-space: nowrap;
}
</style>

<div class="container">
    <div class="text-center mt-5">
        <h1>Ajouter admine</h1>
    </div>

    <form action="../actions/ajouteradmin.php" method="post">

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-2 mx-auto p-4 bg-light" >
                <div class="card-body bg-light">
                        <div class="container">
                          
                            <div class="row">
                                <div class=" mt-4">
                                    <div class="form-group">
                                        <label for="form_Adress" class="form-label">Username *</label>
                                        <input id="form_Adress" type="text" name="user" class="form-control" placeholder="" required="required" aria-label="Adress">
                                    </div>
                                </div>
                                <div class=" mt-4">
                                    <div class="form-group">
                                    <p id="message"></p>
                                        <label for="form_need" class="form-label">Password*</label>
                                        <input type="text
                                        " id="birthdate"  name="pass" class="form-control" aria-label="Date Naissance">
                                    </div>
                                </div>
                            </div>
                            
                            <div class=" col-sm-6 mx-auto text-center mt-5">
                            <input type="submit" class="btn btn-dark  col-5  btn-send p-2 btn-block" value="Ajouter">
                        </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
 </form>
  
 <main>
    <!-- Bootstrap Tables -->
    <div class="container mt-4">
    <div class="text-center mt-5">
        <h1>Table des admine</h1>
    </div>
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
                            <th scope="col">Admine</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admin as $v) { ?>
                        <tr>
                            <th scope="row"><?=$v['id']?></th>
                            <td><?=$v['username']?></td>
                            
                            <td>
                            <a href="../actions/supprimeradmin.php?id=<?=$v['id']?>" class="btn btn-danger" >Suprimmer</a>                              
                              <a href="modifier_admin.php?id=<?=$v['id']?>" class="btn btn-primary" >Modifier</a>
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
