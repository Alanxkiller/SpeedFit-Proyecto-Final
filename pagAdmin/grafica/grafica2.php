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
  <title>Categorías</title>
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