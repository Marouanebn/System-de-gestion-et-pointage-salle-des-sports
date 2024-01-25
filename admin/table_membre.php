<?php 
include_once"includes/header.php";
include_once "classes/connexion.class.php";
$membres= connexion::all("membre");
// print_r($membres);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>
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
      <th scope="col">DATE ISNCRIPTION</th>
      <th scope="col">Coach</th>
      <th scope="col">Modifer</th>
      <th scope="col">Supprimer</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($membres as $v) { ?>
    <tr>
      <th scope="row"><?=$v['id']?></th>
      <td><?=$v['Nom_complet']?></td>
      <td><?=$v['Cin']?></td>
      <td><?=$v['Adress']?></td>
      <td><?=$v['Datenaissance']?></td>
      <td><?=$v['Tel']?></td>
      <td><?=$v['Genre']?></td>
      <td><?=$v['date_inscription']?></td>
      <td><?=$v['date_inscription']?></td>
      <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
						</tr>
    </tr>
    <tr>

        <?php }?>
  </tbody></table>
<?php 
include_once"includes/footer.php";
?>