<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nota de Compra</title>
</head>
<body>
       <?php 
        session_start();
        $nombre = $_POST['nombre'];
        $impuesto = 16;
        $_SESSION['modopago'] = $_POST['modopago'];
        $gastosenvio = 0;
        $descuento = 0;
        echo "-----------------------------Nota de pago----------------------------<br><br>";
        echo "Nombre: ". $nombre;
        echo "<br>";
        //echo "Numero de compra Nombre Precio Cantidad Descuento N subtotal";
        foreach($_SESSION['nombreN'] as $key => $value)
        {
        echo "<br>---------------<br>" . $key .
            "<br>---------------<br>" .$value .
            ", Precio: " .$_SESSION['precioN'][$key].
            ", Cantidad: " .$_SESSION['cantidadN'][$key].
            ", Subtotal: " .$_SESSION['subtotalProductoActualN'][$key].
            ", Modo de pago: " .$_SESSION['modopago'];
        }
        echo "<br><br>------------------------------------------------------------";
        echo "<br><br> Descuento del cupon: " .$descuento;
        echo "<br><br> Total: " .$_SESSION['totalN']. "<br>";
    
    
    ?>
    
    <form method="post" action="../index.php" class="login-form" name="form">
    <input class="btn btn-primary" name="pagotarjeta" type="submit" value="Continuar">

    </form>
    
    <?php
    $to = "somebody@example.com";
    $subject = "Nota de Pago";

    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>
    <tr>
    <td>John</td>
    <td>Doe</td>
    </tr>
    </table>
    </body>
    </html>
    ";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>
    
   <?php

    $filenameee =  "img/Cupon3SpeedFit.png";
    $fileName = "img/Cupon3SpeedFit.png"; 
    $email = $_POST['mail'];

    $message ="¡Muy buenas! En el siguiente archivo adjunto se encuentra su cupón:"; 
    
    $subject ="SpeedFit";
    $fromname ="SpeedFit";
    $fromemail = 'speedfithere@gmail.com';  //if u dont have an email create one on your cpanel

    $mailto = $email;  //the email which u want to recv this email

    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));
    // a random hash will be necessary to send mixed content
    $separator = md5(time());
    // carriage return type (RFC)
    $eol = "\r\n";
    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;
    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        
    } else {
    //Nada xd  
    }
    
      

        ?>
    
</body>
</html>