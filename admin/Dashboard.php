<?php 
include_once"classes/connexion.class.php";
include_once "classes/subcribtion.class.php";
include_once"classes/payment.class.php";
include_once"classes/member.class.php";


$rpgenre= connexion::count_genre();       
foreach ($rpgenre as $data) {
  $Genre[]=$data['genre'];
  $number[]=$data['nombre_genre'];
  
} 
$rpmois= subcribtion::number_subscription();    

foreach ($rpmois as  $data) {
  $year []= $data['subscription_year'];
  $mois[]=$data['subscription_month'];
  $total[]=$data['number_of_subscriptions'];
}
$rpmontant = Payment::CalculerMontantParMois();

$totalMember = connexion::totalMemberActive();
// print_r($totalMember);

include_once"includes/sidebar.php";
?>
<style>
.order-card {
    color: #fff;
}
@media screen and (max-width: 768px) {
    #fixv{
        visibility: hidden;
    }
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}</style>

<div class="container text-center">

  <div class="container pb-5 " style="margin-top: 8rem!important;">
    <div class="row justify-content-evenly">
        <div class="col-md-4 col-xl-3 ">
            <div class="card bg-c-blue order-card " >
              <?php  foreach ($totalMember  as $TotalMember) {
                
              ?>
                <div class="card-block">
                    <h6 class="m-b-20">Nombre total de membres actifs</h6>
                    <h2 class="text-right"><i class='bx bx-user-check f-left'></i><span><?=  $TotalMember['TotalPayee']?></span></h2>
                </div>
            </div>
            <?php }?>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">nombre total de membres inactifs</h6>
                    <h2 class="text-right"><i class='bx bx-user-x f-left' ></i><span><?=$TotalMember['TotalNonPayee']?></span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
           
                    <?php 
foreach ($rpmontant as $data) {?>
  



                <div class="card-block">
                    <h6 class="m-b-20">montant total en <?= $data['mois']?></h6>
                    <h2 class="text-right"><i class='bx bx-dollar-circle' style='color:#ffffff f-left'  ></i><span> <?php ?><?= $data['Montant'] ;}?> DH</span></h2>
                </div>
            </div>
        </div>
        
      
	</div>
</div>
<div class="row mt-4 justify-content-evenly align-items-center">
    
    <div class="col-lg-4 col-sm-12">
    <div style="width: 100%;">
<p class="text-center">Analyser du genre</p>

  <canvas id="myChartgenre" ></canvas>
</div>

    </div>
    <div class="col-lg-5 col-sm-12"  id="fixv">
    <div style="width: 100%; ">
<p class="text-center">Analyse des subscription</p>

  <canvas id="myChartsubsciption" ></canvas>
</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script id="genre-analyse">
  const ctx = document.getElementById('myChartgenre');

  const data = {
    labels: <?php echo json_encode($Genre)?> ,
    datasets: [{
      label: 'My First Dataset',
      data:<?php echo json_encode($number)?> ,
      backgroundColor: [ 'rgb(54, 162, 235)', 'rgb(255, 99, 132)','rgb(255, 205, 86)'],
      hoverOffset: 4
    }]
  };

  const config = {
    type: 'doughnut',
    data: data
  };

  new Chart(ctx, config);
</script>

<script id="subscription-analyse">
  const ctj = document.getElementById('myChartsubsciption');

  const labels = <?php echo json_encode($mois);json_encode($mois);?>;
const datasub = {
  labels: labels,
  datasets: [{
   
    label:<?php echo json_encode($mois[0]);?>,
      
    
    data: <?php echo json_encode($total);?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(245, 40, 145, 0.8)',
      'rgba(245, 40, 145, 0.8)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 2
  },
]
};

  const configsub = {
  type: 'bar',
  data: datasub,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
    
  },
};

  new Chart(ctj, configsub);
</script>
</body>
</html>
