<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <title>Document</title>
</head>
<body>

<?php 
  $con = new mysqli('localhost','root','','tiendatenis');
  $query = $con->query("SELECT categoria, SUM(existencia) as existencia FROM productos GROUP BY (categoria)");

  foreach($query as $data)
  {
    $mes[] = $data['categoria'];
    $ventas[] = $data['existencia'];
  }

?>


<div style="width: 600px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  
    const labels=<?php echo json_encode($mes) ?>;
    const data = {
    labels:labels,
    datasets: [{
        label: 'Existencias',
        data: <?php echo json_encode($ventas) ?>,
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
    };

const config = {
  type: 'pie',
  data: data,
};


  //renderizado del chart con config
  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>