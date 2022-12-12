<?php
    include 'servidor.php';
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Eliminar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estiloEliminar.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
            
        $(document).ready(function(){
            $('#tarjetaProducto').hide();
            
            $('#myOptions').change(function() {
                $("#Refrescar2").load(location.href + " #Refrescar2");//refrescamos las cookies en php por medio de un div
                $("#Refrescar").load(location.href + " #Refrescar");//refrescamos las cookies en php por medio de un div
                $("#tarjetaProducto").load(location.href + " #tarjetaProducto");// refrescamos la tarjeta del producto
                $('#tarjetaProducto').show();
                var displaycourse=$("#myOptions option:selected").text();
                var displaycourse2=$("#myOptions").val(); //obtengo el id del producto seleccionado
                document.cookie="id="+displaycourse2 //guardo el id en una cookie para utilizarla en php
                //alert(displaycourse2);
            });
            
            $('#botonEliminar').click(function (e){
                //empieza cookies
                //la cookie nos servira para obtener el id del producto seleccionado y que sea dinamico
                var cookies = document.cookie
                .split(';')
                .map(cookie => cookie.split('='))
                .reduce((accumulator, [key, value]) => ({ ...accumulator, [key.trim()]: decodeURIComponent(value) }), {});
                //termina cookies
                // para mostrar que las cookies se actualicen alert(cookies.id + "hola");
                
                e.preventDefault();
                var id=cookies.id ;
                
                swal({ // utilizamos sweetalert para mostrar mensajes de confirmacion de eliminacion de un producot
                    title: "Estas seguro?",
                    text: "Una vez que borres este procucto ya no podras recuperarlo",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {// si presiono confirmar para borrar entra a la condicional
                        $.ajax({ // por metodo ajax enviamos por post el id del producto que el usuario selecciono para eliminar
                            method:"POST",
                            url:"codigo.php",
                            data:{
                                'idProducto':id,
                                'botonEliminar': true //lo envio para saber si el boton eliminar fue presionado
                            },
                            success: function(response){
                                if(response== 200){ // si con un echo en la pagina codigo.php regresa 200 significa que si se envio por metodo post y hubo una respuesta
                                    //si se entra aqui significa que se ha borrado el producto
                                    window.location.reload();// actualizamos TODA LA PAGINA WEB
                                    

                                }
                            }
                        });
                    } else {// si presiono no eliminar se mostrara el mensaje de abajo
                        swal("EL producto no se ha eliminado");
                    }
                    });
            });
        });
    </script>
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
                <a class="nav-link" href="formulario.php">Formulario</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="eliminar2prueba.php">Eliminar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="grafica/grafica1.php">Gráfica 1</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="grafica/grafica2.php">Gráfica 2</a>
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
    
// $servidor='localhost';
// $cuenta='id19772797_root';
// $password='Asd123Asd123.';
// $bd='id19772797_tiendatenis';

//     //conexion a la base de datos
//     $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if($conexion->connect_errno){
        die('Error en la conexion');
    }else{
        //conexion exitosa
        if(isset($_POST['submit'])){
            //obtenemos datos del formulario
            $eliminar = $_POST['eliminar'];

            //hacemos cadena con la sentencia mysql para eliminar
            $sql= " DELETE FROM productos WHERE idProd='$eliminar'";
            
            $conexion->query($sql);
            if($conexion->affected_rows >= 1){//revisamos que se elimino
                echo '<br> registro borrado <br>';

            }//fin
        }//fin
        //continuamos con la consulta de datos a la tabla usuarios
        //vemos datos en una de html
        $sql= 'select * from productos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        $resultado = $conexion -> query($sql);
        
        if ($resultado -> num_rows){
            ?>
        <div class="panel">
            
                <legend> Eliminar Producto </legend>
        
                <br>
            
                <select id="myOptions" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='eliminar' >
                    
                    <?php
                    //echo "llego";

                    while( $fila = $resultado -> fetch_assoc() ){//recorremos los registros obtenidos de la tabla
                        echo '<option value="' .$fila["idProd"] .'">'.$fila["nombre"] .'</option>';
                    }
                    ?>
                </select>

                
                <div id="Refrescar"> <?php // servira para saber si la cookie esta puesta
                // el div nos ayudara a refrescar la cookie :)
                    if(isset($_COOKIE['id'])){
                        $idCok=$_COOKIE['id'];
                        $sql= " SELECT * FROM productos WHERE idProd='$idCok'";
                        $resultado = $conexion -> query($sql);
                        $fila = $resultado -> fetch_assoc();
                        
                    }

                ?></div>

                <div id="tarjetaProducto" class="card">
                    <img src="<?php echo "../imgProductos/".$fila['nombreImg']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php  echo $fila["nombre"]; ?></h5>
                        <p class="card-text"><?php  echo $fila["descripcion"]; ?></p>
                        <p class="card-text">existencias: <?php  echo $fila["existencia"]; ?></p>
                        <p class="card-text">$<?php  echo $fila["precio"]; ?></p>
                    </div>
                    
                </div>



                <br><br>
                    
                    <button id="botonEliminar" type="button" value="<?php if(isset($_COOKIE['id'])){echo $_COOKIE['id'];}?>"  class="btn btn-primary">Eliminar</button>
                
            </div>
            <?php
        }else{ ?>
            <h3 class="info">No hay Datos</h3>
        <?php }
    }
    ?>


<p><a href="../index.php">Volver a Inicio</a></p>

</body>
</html>