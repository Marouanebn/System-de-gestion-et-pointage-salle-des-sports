<?php 

include_once "includes/header.php";


?>



<div class="container">
        <div class=" text-center mt-5 ">

            <h1 >Ajouter un membre</h1>
                
            
        </div>

    
    <div class="row ">
      <div class="col-lg-12 " >
        <div class="card mt-2 mx-auto p-4 bg-light" style="height: 70vh;">
            <div class="card-body bg-light">
       
            <div class = "container" >
             <form id="contact-form"  action="actions/ajouterMember.php" method="post" role="form">

            

            <div class="controls" >

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Nom Complet*</label>
                            <input id="form_name" type="text" name="Nom_complet" class="form-control form-control-lg" placeholder="Enter le nom complet et correct*" required="required" data-error="Nom complet is required.">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_Cin">Cin *</label>
                            <input id="form_Cin" type="text" name="Cin" class="form-control" placeholder="Please enter your Cin *" required="required" data-error="Cin is required.">
                                                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_Adress">Adress *</label>
                            <input id="form_Adress" type="Adress" name="Adress" class="form-control" placeholder="Please enter your Adress *" required="required" data-error="Valid Adress is required.">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Date Naissance *</label>
                          <input type="date" name="Date_naissance"  class="form-control"  id="">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_message">Tel *</label>
                            <input type="number" name="Tel" class="form-control"  id="">
                            </div>
                   

                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Genre *</label>
                            <select id="form_need" name="Genre" class="form-control" required="required" data-error="choisi une seul Genre.">
                                <option value="" selected disabled>--choix du genre--</option>
                                <option value="homme">homme</option>
                                <option value="femme">femme</option>
                               
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_message">Date inscription *</label>
                            <input type="date" name="Date_inscription" class="form-control"  id="">
                            </div>
                            </div>
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Dureé *</label>
                            <select id="form_need" name="Durée_mois" class="form-control" required="required" data-error="choisi la durée.">
                                <option value="" selected disabled>--choix du durée--</option>
                                <option value="1 mois" >1 mois</option>
                                <option value="3 mois">3 mois</option>
                               
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        
                        <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                            " value="Ajouter" >
                    
                </div>
          
                </div>


        </div>
         </form>
        </div>
            </div>


    </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->
    </div>
</div>








<?php 

include_once "includes/footer.php";


?>