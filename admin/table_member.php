<?php 
include_once"includes/sidebar.php";
include_once "classes/Member.class.php";
$membres= connexion::all("member");
if(isset($_GET['Nom_complet'])){
  $Nom_complet = $_GET["Nom_complet"];
}else $motCle="";
$Nom_complet=member::getmember($Nom_complet);
// print_r($membres);
                
// print_r($membres);
?>


  <main>
            
            <!--MDB Tables-->
            <div class="container mt-4">
    
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-md-12">
                                <div class="input-group md-form form-sm form-2 pl-0">
                                <form action="table_member.php" method="get" class="text-center" >

<input value="<?=$Nom_complet ?>" type="search" name="Nom_complet" id="" placeholder="Rechercher"> <button>Ok</button>
</form>                                  </div>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                        <!--Table-->
                        <table class="table table-striped">
                            <!--Table head-->
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
      <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger " data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
						</tr>
    </tr>
    <tr>

        <?php }?>
  </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>
                </div>
              
                  
            </div>
            <!--MDB Tables-->
          
        </main>
        <!DOCTYPE html>
<html lang="en">

<?php 
// include_once"includes/footer.php";
?>