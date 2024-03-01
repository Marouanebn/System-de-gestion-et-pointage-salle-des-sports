

<?php 
include_once"../includes/loginchecks.php";
include_once "../classes/member.class.php";

include_once "../includes/sidebar.php";

$admin = connexion::find($_GET['id'], "login");

?>

<form id="contact-form" action="../actions/modifieradmin.php" method="post" role="form">
<div class="container">
    <div class="text-center mt-5">
        <h1>Modifier admine</h1>
    </div>
    <input type="hidden" style="visibility: hidden;" name="id" value="<?=$admin['id']?>">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-2 mx-auto p-4 bg-light" >
                <div class="card-body bg-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_name" class="form-label">username*</label>
                                        
                                        <input id="form_name" value="<?= $admin['username']?>" type="text" name="username" class="form-control " placeholder="Entrer le nom complet et correct*" required="required" aria-label="Nom complet">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_Cin" class="form-label">Password *</label>
                                        <input id="form_Cin" value="<?= $admin['password']?>" type="text" name="password" class="form-control" placeholder="S'il vous plaît entrez votre Cin *" required="required" aria-label="Cin">
                                    </div>
                                </div>
                            </div>
                          
                            </div>
                           
                            <div class="col-md-6 col-sm-6 mx-auto text-center mt-5">
                            <input type="submit" class="btn btn-dark col-5  btn-send  pt-2 btn-block" value="Modifier admine">
                        </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
 </form>
 <?php include_once"../includes/footer.php";?>

