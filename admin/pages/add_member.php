<?php 
include_once"../includes/loginchecks.php";

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
<form id="contact-form" action="../actions/ajouterMember.php" method="post" role="form">
<div class="container">
    <div class="text-center mt-5">
        <h1>Ajouter un membre</h1>
    </div>
<?php

// Check if message exists in session variable
if(isset($_SESSION['message'])) {
    // Display message
    echo "<div>".$_SESSION['message']."</div>";

    // Clear session variable
    unset($_SESSION['message']);
}
?> 

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
                            <style>.email-input {
    --text: #646B8C;
    --text-placeholder: #BBC1E1;
    --icon: #A6ACCD;
    --icon-focus: #646B8C;
    --icon-invalid: #F04949;
    --icon-valid: #16BF78;
    --background: #fff;
    --border: #D1D6EE;
    --border-hover: #A6ACCD;
    --border-focus: #275EFE;
    --shadow-focus: #{rgba(#275EFE, .32)};
    position: relative;
    input {
        width: 100%;
        /* -webkit-appearance: none; */
        outline: none;
        display: block;
        font-size: 14px;
        font-family: inherit;
        margin: 0;
        padding: 8px 16px 8px 41px;
        line-height: 26px;
        border-radius: 6px;
        color: var(--text);
        border: 1px solid var(--bc, var(--border));
        background: var(--background);
        transition: border-color .3s, box-shadow .3s;
        &::placeholder {
            color: var(--text-placeholder);
        }
    }
    svg {
        width: 16px;
        height: 16px;
        top: 14px;
        left: 14px;
        display: block;
        position: absolute;
        fill: none;
        stroke: var(--i, var(--icon));
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-width: 1.6;
        transition: stroke .3s;
        path {
            stroke-dasharray: 80;
            stroke-dashoffset: var(--path, 170);
            transition: stroke-dashoffset .5s ease var(--path-delay, .3s);
        }
        polyline {
            stroke-dasharray: 12;
            stroke-dashoffset: var(--tick, 12);
            transition: stroke-dashoffset .45s ease var(--tick-delay, 0s);
        }
    }
    &:hover {
        --bc: var(--border-hover);
    }
    &:focus-within {
        --bc: var(--border-focus);
        --i: var(--icon-focus);
        input {
            box-shadow: 0 1px 6px -1px var(--shadow-focus);
        }
    }
    &:not(.valid) {
        input {
            &:not(:placeholder-shown) {
                &:not(:focus) {
                    & + svg {
                        --i: var(--icon-invalid);
                    }
                }
            }
        }
    }
    &.valid {
        --i: var(--icon-valid);
        --path: 132;
        --path-delay: 0s;
        --tick: 0;
        --tick-delay: .3s;
    }
}

html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
}

* {
    box-sizing: inherit;
    &:before,
    &:after {
        box-sizing: inherit;
    }
}
</style>
<script>const regex = new RegExp(
    '^(([^<>()[\\]\\\\.,;:\\s@\\"]+(\\.[^<>()[\\]\\\\.,;:\\s@\\"]+)*)|' +
    '(\\".+\\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])' +
    '|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$'
);

document.querySelectorAll('.email-input').forEach(container => {

    let input = container.querySelector('input')

    input.addEventListener('keyup', e => container.classList.toggle('valid', regex.test(input.value)))

});</script>
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label for="form_Adress" class="form-label">Email *</label>
                                        <div class="email-input form-group">
    <input id="form_Adress" type="email"  class="form-control col-md-6 mt-4" name="Adress" placeholder="aaron@gmail.com">
    <svg viewBox="0 0 18 18">
        <path d="M11.5,10.5 C6.4987941,17.5909626 1,3.73719105 11.5,6 C10.4594155,14.5485365 17,13.418278 17,9 C17,4.581722 13.418278,1 9,1 C4.581722,1 1,4.581722 1,9 C1,13.418278 4.581722,17 9,17 C13.418278,17 17,13.42 17,9"></path>
        <polyline points="5 9.25 8 12 13 6"></polyline>
    </svg>
</div>
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
                                            <!-- <option value="3 mois">3 mois</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mx-auto text-center mt-5">
                            <input type="submit" class="btn btn-dark col-5  btn-send p-2  btn-block" value="Ajouter">
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