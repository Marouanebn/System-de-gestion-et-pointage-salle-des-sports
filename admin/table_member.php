<?php 
include_once"includes/header.php";
include_once "classes/connexion.class.php";
$membres= connexion::all("member");
// print_r($membres);
?>

<table  id="datatable"class="table table-striped-columns" style="width:100%">
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
      <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger " data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
						</tr>
    </tr>
    <tr>

        <?php }?>
  </tbody></table>
<?php 
include_once"includes/footer.php";
?>