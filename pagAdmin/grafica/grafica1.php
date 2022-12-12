<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/estilosForm.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link REL="SHORTCUT ICON" HREF="../../img/SpeedFit.png">
  <title>Ventas</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PANEL DE ADMINISTRADOR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="../formulario.php">Formulario</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../eliminar2prueba.php">Eliminar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="grafica1.php">Ventas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="grafica2.php">Categorías</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="index.php">Consultas</a>
                </li>

                <li id="carritoMostrar" class="nav-item">
                <a class="nav-link" href="#"> carrito <span class="badge bg-secondary"></span></a>
                </li> -->
                
            </ul>
            </div>
        </div>
    </nav>

<?php 
  $con = new mysqli('localhost','root','','tiendatenis');
  $query = $con->query("SELECT * from ventas");

  foreach($query as $data)
  {
    $mes[] = $data['mes'];
    $ventas[] = $data['ventas'];
  }

?>


<div style="width: 1000px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($mes) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Ventas del anio',
      data: <?php echo json_encode($ventas) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
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
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  //renderizado del chart con config
  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>