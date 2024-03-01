<?php
include_once"../includes/loginchecks.php";
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
                            
                            <div class=" col-sm-6 mx-auto text-center mt-5">
                            <input type="submit" class="btn btn-dark col-5  btn-send p-2 btn-block" value="Ajouter">
                        </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
 </form>
 <form id="contact-form" action="../actions/ajoutercoach.php" method="post" role="form">
        <div class="container">
            <div class="text-center mt-5">
                <h1>Ajouter un coach </h1>
            </div>
     
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-2 mx-auto p-4 bg-light" >
                        <div class="card-body bg-light">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="form_name" class="form-label">Nom Complet*</label>
                                                
                                                <input id="form_name" type="text" name="Nom_complet" class="form-control " placeholder="Entrer le nom complet et correct*" required="required" aria-label="Nom complet">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="form_Cin" class="form-label">Cin *</label>
                                                <input id="form_Cin" type="text" name="Cin" class="form-control" placeholder="Ex : BK5552551 *" required="required" aria-label="Cin">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="form-group">
                                                <label for="form_Cin" class="form-label">tel *</label>
                                                <input id="form_Cin" type="number" name="tel" class="form-control" placeholder="Ex : BK5552551 *" required="required" aria-label="Cin">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mx-auto mt-5 text-center justify-content-center">
                                          <input type="submit" class="btn btn-dark col-5 btn-send pt-2 btn-block" value="Ajouter">
                                        </div>
         </form>
</body>
</html>