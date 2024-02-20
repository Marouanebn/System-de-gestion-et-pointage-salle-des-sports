<?php 

include_once"../includes/sidebar.php";
include_once '../classes/connexion.class.php';
include_once '../classes/member.class.php';
include_once '../classes/subcribtion.class.php';
include_once '../classes/payment.class.php';



function GetLastMember()
{
    try {
        $cnx = connexion::connecter_db();
        $rp = $cnx->prepare("SELECT Nom_complet FROM member ORDER BY Member_id DESC LIMIT 1");
        $rp->execute();
        $resultat = $rp->fetchColumn();
        return $resultat !== false ? $resultat : null;
    } catch (\Throwable $th) {
        return "Erreur de selection des membres " . $th->getMessage();
    }
}

?>

<style>body {
    font-family: 'Lato', sans-serif;
}

h1 {
    margin-bottom: 40px;
}

label {
    color: #333;
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px;
    }
.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px;

}

.card{
	margin-left: 10px;
	margin-right: 10px;
}
</style>
<?php echo "<div class=\"alert alert-success\" role=\"alert\">"
                . "Member  " . GetLastMember()
                . " added successfully</div>";?>
<form id="contact-form" action="../actions/ajouterMember.php" method="post" role="form">
<div class="container">
    <div class="text-center mt-5">
        <h1>Ajouter un membre</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-2 mx-auto p-4 bg-light" >
                <div class="card-body bg-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_name" class="form-label">Nom Complet*</label>
                                        
                                        <input id="form_name" type="text" name="Nom_complet" class="form-control " placeholder="Entrer le nom complet et correct*" required="required" aria-label="Nom complet">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_Cin" class="form-label">Cin *</label>
                                        <input id="form_Cin" type="text" name="Cin" class="form-control" placeholder="Ex : BK5552551 *" required="required" aria-label="Cin">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_Adress" class="form-label">Email *</label>
                                        <input id="form_Adress" type="text" name="Adress" class="form-control" placeholder="Ex: ahmedhamido5@gmail.com *" required="required" aria-label="Adress">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                    <p id="message"></p>
                                        <label for="form_need" class="form-label">Date Naissance *</label>
                                        <input type="date" id="birthdate" onchange="checkAge(this.value)" name="Date_naissance" class="form-control" aria-label="Date Naissance">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_message" class="form-label">Tel *</label>
                                        <input type="number" name="Tel" placeholder="Ex : 06 25 25 15 77" class="form-control" aria-label="Tel">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_need" class="form-label">Genre *</label>
                                        <select id="form_need" name="Genre" class="form-select " required="required" aria-label="Genre">
                                            <option value="" selected disabled>--choix du genre--</option>
                                            <option value="homme">homme</option>
                                            <option value="femme">femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_message" class="form-label">Date inscription *</label>
                                        <input type="date" name="Date_inscription" class="form-control" aria-label="Date inscription">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_need" class="form-label">Durée *</label>
                                        <select id="form_need" name="Durée_mois" class="form-select" required="required" aria-label="Durée">
                                            <option value="" selected disabled>--choix du durée--</option>
                                            <option value="1 mois">1 mois</option>
                                            <option value="3 mois">3 mois</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mx-auto mt-5">
                            <input type="submit" class="btn btn-success col-5  btn-send pt-2 btn-block" value="Ajouter">
                        </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>
 </form>
 <script>
function checkAge(birthDateString) {
    var messageElement = document.getElementById('message');
    var today = new Date();
    var birthDate = new Date(birthDateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    if (age >= 18) {
        messageElement.textContent = '';
        messageElement.style.display = 'none';
    } else {
        messageElement.textContent = 'Le member est mineur';
        messageElement.style.color = 'red';
        
    }
}
</script>


<?php 

include_once "../includes/footer.php";


?>