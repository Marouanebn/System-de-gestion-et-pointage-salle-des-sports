<?php 
include_once"includes/header.php";
include_once"classes/connexion.class.php";

$rpgenre= connexion::count_genre();       
   
$rpmois= connexion::number_subscription();    
foreach ($rpgenre as $data) {
    $Genre[]=$data['genre'];
    $number[]=$data['nombre_genre'];
   
} foreach ($rpmois as  $data) {
  $mois[]=$data['subscription_month'];
    $total[]=$data['number_of_subscriptions'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col-6">
    <div style="width: 300px;">
<p class="text-center">Gneder</p>

  <canvas id="myChartgenre" ></canvas>
</div>

    </div>
    <div class="col-6">
    <div style="width: 500px; height: 500px;">
<p class="text-center">mois</p>

  <canvas id="myChartsubsciption" ></canvas>
</div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      1 of 3
    </div>
    <div class="col">
      2 of 3
    </div>
    <div class="col">
      3 of 3
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
      backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
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

  const labels = <?php echo json_encode($mois);?>;
const datasub = {
  labels: labels,
  datasets: [{
   
    label:<?php echo json_encode($mois[0]);?>,
      
    
    data: <?php echo json_encode($total)?>,
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
