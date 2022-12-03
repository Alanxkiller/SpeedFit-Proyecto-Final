<?php
    session_start();
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='tiendatenis';
    $contador=0;
    // Create connection
    $conn = new mysqli($servidor,$cuenta,$password,$bd);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST['idProd'])){
        $id = $_POST['idProd'];
        $query= "SELECT * FROM productos WHERE idProd='$id' ";
        $resultado = $conn -> query($query);
        $existenciaBase = $resultado -> fetch_assoc(); //te quedaste aqui
        //echo "hola soy existencia = " . $existenciaBase['existencia'] ."ffff " .$_SESSION['carrito']['productos'][$id] ;
        
        //AQUI CHECAMOS QUE NO SE PASE DE EXISTENCIA
        //de la base de datos agarramos el numero de existencias y comparamos haber si el usuario no ha escogido mas de lo que hay
        if($existenciaBase['existencia'] > $_SESSION['carrito']['productos'][$id]){
            if($_SESSION['totalProductos']){
                $_SESSION['totalProductos']+=1;// no es la primera vez que se envia este producto
            }else{
                $_SESSION['totalProductos']=1;//primera vez que se envia
            }
    
    
            //$id = $_POST['idProd'];
            if(isset($_SESSION['carrito']['productos'][$id])){
                $_SESSION['carrito']['productos'][$id]+=1;// no es la primera vez que se envia este producto
            }else{
                $_SESSION['carrito']['productos'][$id]=1;//primera vez que se envia
            }
        }
        
    }

    if(isset($_POST['idProdEliminar']) && isset($_POST['cantidadRestar'])){// si se apreto el boton de eliminar
        if(isset($_SESSION['carrito']['productos'][$_POST['idProdEliminar']])){
            $_SESSION['totalProductos']-=$_POST['cantidadRestar'];
            unset($_SESSION['carrito']['productos'][$_POST['idProdEliminar']]); ?>
            <script>window.location.href="carrito.php"</script>
        <?php }
    }
    
    //checare de que categoria fue llamada esta pagina web, para asi devolverla despues a esa pagina
    if(isset($_POST['categoria'])){
        if($_POST['categoria'] == "raqueta"){ ?>
            <script>window.location.href="categoria2.php"</script>
        <?php } else if($_POST['categoria'] == "deporte"){ //si presiono algo de deporte?> 
            <script>window.location.href="categoria1.php"</script>
        <?php }
    } 
    
?>
            <script>window.location.href="categoriaGeneral.php"</script>

