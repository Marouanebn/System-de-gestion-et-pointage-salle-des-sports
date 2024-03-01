<?php 
include_once "../classes/member.class.php";
include_once"../includes/loginchecks.php";

include_once "../includes/sidebar.php";

$member = member::find($_GET['id'], "member");
$sub = member::find($_GET['id'], "subscription");

?>

<form id="contact-form" action="../actions/modifierMember.php" method="post" role="form">
<div class="container">
    <div class="text-center mt-5">
        <h1>Modifier un membre</h1>
    </div>
    <input type="hidden" style="visibility: hidden;" name="member_id" value="<?=$member['Member_id']?>">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-2 mx-auto p-4 bg-light" >
                <div class="card-body bg-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_name" class="form-label">Nom Complet*</label>
                                        
                                        <input id="form_name" value="<?= $member['Nom_complet']?>" type="text" name="Nom_complet" class="form-control " placeholder="Entrer le nom complet et correct*" required="required" aria-label="Nom complet">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_Cin" class="form-label">Cin *</label>
                                        <input id="form_Cin" value="<?= $member['Cin']?>" type="text" name="Cin" class="form-control" placeholder="S'il vous plaît entrez votre Cin *" required="required" aria-label="Cin">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_Adress" class="form-label">Adress *</label>
                                        <input id="form_Adress" value="<?= $member['Adress']?>" type="text" name="Adress" class="form-control" placeholder="S'il vous plaît entrez votre Adress *" required="required" aria-label="Adress">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_need" class="form-label">Date Naissance *</label>
                                        <input type="date"  value="<?= $member['Date_naissance']?>" name="Date_naissance" class="form-control" aria-label="Date Naissance">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_message" class="form-label">Tel *</label>
                                        <input type="number" value="<?= $member['Tel']?>"  name="Tel" class="form-control" aria-label="Tel">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_need" class="form-label">Genre *</label>
                                        <select id="form_need"  name="Genre" class="form-select " required="required" aria-label="Genre">
                                            <option  value="<?= $member['Genre']?>" ><?= $member['Genre']?></option>
                                            <option  value="homme">homme</option>
                                            <option value="femme">femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_message" class="form-label">Date inscription *</label>
                                        <input type="date" value="<?= $sub['Date_inscription']?>" name="Date_inscription" class="form-control" aria-label="Date inscription">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_need" class="form-label">Durée *</label>
                                        <select id="form_need" name="Durée_mois" class="form-select" required="required" aria-label="Durée">
                                            <option value="<?= $sub['Durée_mois']?>" ><?= $sub['Durée_mois']?></option>
                                            <option value="1 mois">1 mois</option>
                                            <!-- <option value="3 mois">3 mois</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mx-auto  text-center mt-5">
                            <input type="submit" class="btn btn-dark col-5  btn-send pt-2 btn-block" value="Modifier member">
                        </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
 </form>
 <?php include_once"../includes/footer.php";?>

