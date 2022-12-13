<?php
    session_start();
    
    if(isset($_POST['idProd'])){
        
        if($_SESSION['totalProductos']){
            $_SESSION['totalProductos']+=1;// no es la primera vez que se envia este producto
        }else{
            $_SESSION['totalProductos']=1;//primera vez que se envia
        }


        $id = $_POST['idProd'];
        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id]+=1;// no es la primera vez que se envia este producto
        }else{
            $_SESSION['carrito']['productos'][$id]=1;//primera vez que se envia
        }
    }
?>
<script>window.location.href="index.php"</script>