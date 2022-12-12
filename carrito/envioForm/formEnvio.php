<?php
require 'tabEnvio.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estiloFormCompra.css">
    <link REL="SHORTCUT ICON" HREF="../../img/SpeedFit.png">
    <title>Formulario de envío</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <script type="text/javascript">
        function validar(){
            var form= document.form;
            if(form.nombreC.value==0){
                swal('campo vacio','El campo nombre está vació', 'error')
                form.nombreC.value="";
                form.nombreC.focus();
                return false;
            }
            if(form.email.value==0){
                swal('campo vacio','El campo email está vació', 'error')
                form.email.value="";
                form.email.focus();
                return false;
            }
            if(form.direccion.value==0){
                swal('campo vacio','El campo direccion está vació', 'error')
                form.direccion.value="";
                form.direccion.focus();
                return false;
            }
            if(form.ciudad.value==0){
                swal('campo vacio','El campo ciudad está vació', 'error')
                form.ciudad.value="";
                form.ciudad.focus();
                return false;
            }
            if(form.pais.value==0){
                swal('campo vacio','El campo país está vació', 'error')
                form.pais.value="";
                form.pais.focus();
                return false;
            }
            if(form.cp.value==0){
                swal('campo vacio','El campo código postal está vació', 'error')
                form.cp.value="";
                form.cp.focus();
                return false;
            }
            if(form.tel.value==0){
                swal('campo vacio','El campo telefono está vació', 'error')
                form.tel.value="";
                form.tel.focus();
                return false;
            }
            swal('datos enviados con exito', 'success')
            form.submit();
        }            
    </script>
</head>
<body>
    <h2>¿A dónde quieres que te llegue tu pedido?</h2>
    <form  method="post" action="formEnvio.php" name="form" class="login-form">
    
        <div class="input-group">
            <label>Nombre completo:</label>
            <input type="text" name="nombreC" class="input" value="" onload="return validar();" >
        </div>
        <div class="input-group">
            <label>Correo Electrónico:</label>
            <input type="email" name="email" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>Dirección:</label>
            <input type="text" name="direccion" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>Ciudad:</label>
            <input type="text" name="ciudad" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>País:</label>
            <input type="text" name="pais" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>Código postal:</label>
            <input type="number" name="cp" class="input" value="" onload="return validar();">
        </div>
        <div class="input-group">
            <label>Número telefónico:</label>
            <input type="num" name="tel" id="tel" class="input" value="" onload="return validar();">
        </div>
        <div class="form-input">
            <button id="envio-btn" name="envio-btn" onclick="return validar();">Aceptar</button>
        </div>
        
        
        <p> <a href="">Volver</a></p>
    </form> 
    <script>
        let btn = document.getElementById("envio-btn");
        let tel = document.getElementById("tel");
        btn.addEventListener("click",()=>{
            console.log(tel.value);
        })
    </script>
</body>
</html>