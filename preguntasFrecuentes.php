<?php
    include "header.php";
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Colocamos favicon con puro html -->
    <link REL="SHORTCUT ICON" HREF="img/SpeedFit.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Bootstrap CSS para iconos de redes sociales -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Nuestro CSS -->
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilosIndex/responsive.css">
    <script src="https://kit.fontawesome.com/1cd1525fc0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styleMain.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        var a = 0;
        var b = 0;
        var c = 0;
        var d = 0;
        var e = 0;
        var f = 0;
        var g = 0;
        var h = 0;
    $(document).ready(function(){
        $("#1b").hide();
        $("#2b").hide();
        $("#3b").hide();
        $("#4b").hide();
        $("#5b").hide();
        $("#6b").hide();
        $("#7b").hide();
        $("#8b").hide();
      $("#1a").click(function(){
          if (a == 0){
              $("#1b").show(); 
              a = 1;
          }else{
              $("#1b").hide();
              a =0;
          }
      });
      $("#2a").click(function(){
          if (b == 0){
              $("#2b").show(); 
              b = 1;
          }else{
              $("#2b").hide();
              b =0;
          }
      });
      $("#3a").click(function(){
          if (c == 0){
              $("#3b").show(); 
              c = 1;
          }else{
              $("#3b").hide();
              c =0;
          }
      });
      $("#4a").click(function(){
          if (d == 0){
              $("#4b").show(); 
              d = 1;
          }else{
              $("#4b").hide();
              d =0;
          }
      });
      $("#5a").click(function(){
          if (e == 0){
              $("#5b").show(); 
              e = 1;
          }else{
              $("#5b").hide();
              e =0;
          }
      });
      $("#6a").click(function(){
          if (f == 0){
              $("#6b").show(); 
              f = 1;
          }else{
              $("#6b").hide();
              f =0;
          }
      });
      $("#7a").click(function(){
          if (g == 0){
              $("#7b").show(); 
              g = 1;
          }else{
              $("#7b").hide();
              g =0;
          }
      });
      $("#8a").click(function(){
          if (h == 0){
              $("#8b").show(); 
              h = 1;
          }else{
              $("#8b").hide();
              h =0;
          }
      });
    });
    </script>

    <title>Preguntas Frecuentes</title>
  </head>
<body>
    <div id="container ans">
        <h2 id="1a">01. ¿A cuánto ascienden los gastos de envío?</h2> <br>
        <h4 id="1b">A continuación compartimos los costos de envío que aplican dentro del Territorio Nacional.

CÁLCULO DEL COSTO DE ENVÍO

<br><br>-Órdenes menores a $999 MXN el costo de envío es de $129.
<br>-Órdenes mayores a $999 MXN el costo de envío es completamente gratuito.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="2a">02. ¿Por qué se retrasa mi pedido?</h2> <br>
        <h4 id="2b">Nuestros tiempos de envío a todo el País es de 3 a 5 días hábiles. Si ya pasó este periodo, por favor contacta al área de atención al cliente, por correo speedfit24@gmail.com, nuestros asesores están listos para apoyarte.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="3a">03. ¿Cuánto tardará en llegar mi pedido?</h2> <br>
        <h4 id="3b">Nuestros tiempos de envío a todo el País es de 3 a 5 días hábiles. 

        Una vez que nuestro almacén termine la preparación de tu pedido recibirás un correo electrónico de confirmación con tu guía de seguimiento. Speedfit realizará la entrega en la dirección registrada en la orden de 3 (tres) a 5 (cinco) días hábiles**</h4>
    </div ><br><br>
    <div id="container ans">
        <h2 id="4a">04. ¿Qué tengo que hacer si he recibido un producto incorrecto?</h2><br>
        <h4 id="4b">En caso de que Speedfit haya enviado un artículo diferente al solicitado, deberás comunicarte a nuestro Centro de Atención a Clientes para iniciar un proceso de devolución y procederá el reembolso íntegro de tu dinero y otorgará un cupón de descuento para que puedas utilizarlo en tu próxima compra.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="5a">05. ¿Mi pedido aparece como entregado pero no lo he recibido qué puedo hacer?</h2><br>
        <h4 id="5b">Speedfit te invita a realizar el seguimiento continuo de tu pedido para detectar y reportar cualquier anormalidad. Si en el seguimiento de tu pedido aparece como entregado y tú no lo has recibido físicamente, deberás comunicarte de inmediato con nuestro Centro de Atención a Clientes para que podamos iniciar tu proceso de investigación.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="6a">06. ¿Es necesario crear una cuenta para comprar?</h2><br>
        <h4 id="6b">Registrarse no es necesario. Puedes realizar un pedido en la tienda online como invitado, pero, si planeas hacer compras de manera regular, te recomendamos registrarte, ya que te ahorrará tiempo cuando vuelvas a hacer un pedido en la tienda online.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="7a">07. ¿Puedo pedir una factura?</h2><br>
        <h4 id="7b">Es posible solicitar una factura al momento en el que te encuentras realizando tu orden. <br>

        Una vez que terminas de colocar tus datos de envío, encontrarás una casilla, la cual, deberás habilitar para poder llenar los campos de RFC y Razón social. Antes de finalizar tu compra, asegúrate de validar toda la información que aparecerá en tu factura (nombre, domicilio, correo electrónico, teléfonos, RFC y Razón social), ya que una vez que esta sea emitida no podrán solicitarse correcciones.</h4>
    </div><br><br>
    <div id="container ans">
        <h2 id="8a">08. ¿Qué garantía tienen mis productos?</h2><br>
        <h4 id="8b">Para Speedfit la calidad es lo primero. Comprobamos exhaustivamente todos nuestros productos en condiciones reales para asegurarnos de que están en óptimas condiciones para soportar los usos para los que han sido diseñados. Sin embargo, a veces resulta inevitable que se entregue un producto defectuoso. <br>

        Si un producto que compraste en nuestra tienda online presenta daños de origen y problemas con la calidad y quieres devolverlo, deberás hacerlo a través de nuestro Servicio de Atención a Clientes. En cuanto lo recibamos, nuestro departamento de calidad procederá a inspeccionar el producto. <br>

        Te reembolsaremos el importe del producto tanto si, una vez realizada la comprobación, observamos que presenta defectos de fabricación como si simplemente no se ajusta a las condiciones normales de venta de un producto. <br>

        No darán lugar a indemnización los productos defectuosos por motivos distintos a los anteriores, como por ejemplo la negligencia, el mal uso o el desgaste natural del producto. En ningún caso darán parte a indemnización los productos que no fueron adquiridos en la tienda online. <br>

        Ten en cuenta que la vida útil de un producto depende en gran medida de cómo lo uses y en qué condiciones lo uses. No se sustituirán los productos dañados por el uso y el desgaste normales o que hayan excedido la vida razonable del producto.</h4>
    </div><br><br>
</body>
</html>