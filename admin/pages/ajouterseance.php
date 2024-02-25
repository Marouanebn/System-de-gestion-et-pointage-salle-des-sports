<?php
include_once "../includes/sidebar.php";
include_once "../classes/member.class.php";
include_once "../classes/coach.class.php";

$member = member::afficher_nom_client();
$coach = coach::afficher_coach();
// print_r($member);

?>

<div class="container">
    <div class="text-center mt-5">
        <h1>Ajouter client du coach</h1>
    </div>

    <form action="../actions/ajouterseance.php" method="post">

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-2 mx-auto p-4 bg-light" >
                <div class="card-body bg-light">
                        <div class="container">
                            <div class="row">
                                <div class=" mt-4">
                                    
                                        <label for="form_name" class="form-label"></label>
                                      
                                        <div class=" mt-4">
                                    <div class="form-group">
                                        <label for="form_need" class="form-label">Nom member*</label>
                                        <select id="form_need" name="nom_member" class="form-select " required="required" aria-label="Genre">
                                            <option value="" selected disabled>--choix du Member--</option>
                                            <?php 
                                        foreach ($member as $nom_member) {
                                         
                                        ?>
                                            <option value="<?=$nom_member['Member_id']?>"><?=$nom_member['Nom_complet']?></option>
                                            
                                            <?php }?>
                                        </select>
                                    </div>
                                    
                                </div>                                  
                                </div>
                                <div class=" mt-4">
                                <div class="form-group">
                                        <label for="form_need" class="form-label">Nom coach*</label>
                                        <select id="form_need" name="nom_coach" class="form-select " required="required" aria-label="Genre">
                                            <option value="" selected disabled>--choix du coach--</option>
                                            <?php 
                                        foreach ($coach as $nom_member) {
                                         
                                        ?>
                                            <option value="<?=$nom_member['coach_id']?>"><?=$nom_member['Nom_complet']?></option>
                                            
                                            <?php }?>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class=" mt-4">
                                    <div class="form-group">
                                        <label for="form_Adress" class="form-label">nombre du seance  *</label>
                                        <input id="form_Adress" type="number" name="seance" class="form-control" placeholder="" required="required" aria-label="Adress">
                                    </div>
                                </div>
                                <div class=" mt-4">
                                    <div class="form-group">
                                    <p id="message"></p>
                                        <label for="form_need" class="form-label">Montant en DH *</label>
                                        <input type="number" id="birthdate"  name="montant" class="form-control" aria-label="Date Naissance">
                                    </div>
                                </div>
                            </div>
                            
                            <div class=" col-sm-6 mx-auto mt-5">
                            <input type="submit" class="btn btn-success col-5  btn-send pt-2 btn-block" value="Ajouter">
                        </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
 </form>
</body>
</html>