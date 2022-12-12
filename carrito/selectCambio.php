<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
    session_start();
if(isset($_POST['pago'])){
    $pago=$_POST['pago'];
}
    
    $numeroRandom2=rand(1000000000,9999999999);
    
    ?>
    <!-- Logica de seleccion del select xd-->
    <script>
        $(document).ready(function() {
            $('#pago1').hide();
            $('#pago2').hide();
            $('#myOptions').change(function() {


                // var displaycourse=$("#myOptions option:selected").text();
                // var displaycourse2=$("#myOptions").val(); //obtengo el id del producto seleccionado
                if ($("#myOptions").val() == 1) {
                    
                    $('#pago2').hide();
                    $('#pago').show();

                } else if ($("#myOptions").val() == 2) {
                    $('#pago').hide();
                    $('#pago2').show();
                }
            });
        });

    </script>
</head>

<body>


    <select id="myOptions" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='eliminar'>
        <option value="1">Pago por tarjeta</option>';
        <option value="2">Pago en el OXXO</option>';
    </select>

    <div id="pago" class="card" style="width: 18rem;">
        Pago por tarjeta
        <br>

        <form method="post" action="notacompra.php" class="login-form" name="form">

            <img src="../img/Visa-MasterCard.png" alt="" style="max-width:100%;height:auto;">

            <div class="input-group">
                <label>Nombre: </label>
                <input type="text" name="nombre" class="input">
            </div>

            <div class="input-group">
                <label>Numero de tarjeta: </label>
                <input type="text" name="numero" class="input">
            </div>

            <div class="remember">
                <input type="checkbox" name="remember"> <label>Recordar datos de envío</label>
            </div>
            
            <input type="hidden" name="modopago" value="Pago por tarjeta">

            <input class="btn btn-primary" name="pagotarjeta" type="submit" value="Realizar Pago">

        </form>

    </div>
    <div id="pago2" class="card" style="width: 18rem;">
        Pago en el OXXO
        <br>
        <form method="post" action="notacompra.php" class="login-form" name="form2">

            <img src="../img/OxxoOriginal.png" alt="" style="max-width:60%;height:auto;">

            <div class="input-group">
                <label>Nombre: </label>
                <input type="text" name="nombre" class="input">
            </div>

            <div class="remember">
                <input type="checkbox" name="remember"> <label>Recordar datos de envío</label>
            </div>
            
            <img src="../img/codigoB.png" alt="" style="max-width:60%;height:auto;">
            <br>
            <?php echo $numeroRandom2?>
            <br>
            
            <input type="hidden" name="modopago" value="Pago por OXXO">
            
            <input class="btn btn-primary" name="pagotarjeta" type="submit" value="Realizar Pago">

        </form>


    </div>

</body>

</html>
