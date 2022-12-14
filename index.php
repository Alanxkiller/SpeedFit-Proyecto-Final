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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS para iconos de redes sociales -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Nuestro CSS -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilosIndex/responsive.css">
    <script src="https://kit.fontawesome.com/1cd1525fc0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styleMain.css">
    <link rel="stylesheet" href="styles/responsive.css">
    <link rel="stylesheet" href="footer/CSS/Estilos.css">
    <title>Speedfit</title>
</head>

<body>
    <!-- carrusel-->
    <header>
        <span class="green">SPEEDFIT</span>
        <span class="white">RUN WITHOUT</span>
        <span class="normal">LIMITS</span>
        <?php
        $msg = "*poner cupones*";
        ?>

    </header>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carr1.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carr2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carr3.webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="adv">
        <h1>COMPRA AHORA</h1>
        <p>Escoge entre una de nuestras categor??as</p>
    </div>

    <div class="card-category">
        <div class="category">
            <h3>Deportivos</h3>
            <?php if(isset($_SESSION['username'])) { ?>
            <a href="carrito/categoria1.php">Ir a la categor??a</a>
            <?php }else{ ?>
            <p class="nav-link">Inicia Sesi??n para Comprar</a>
                <?php } ?>

        </div>
        <div class="category">
            <h3>Casual</h3>
            <?php if(isset($_SESSION['username'])) { ?>
            <a href="carrito/categoria2.php">Ir a la categor??a</a>
            <?php }else{ ?>
            <p class="nav-link">Inicia Sesi??n para Comprar</a>
                <?php } ?>
        </div>
    </div>

    <div id="container">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

            <label for="inlineFormInputName">Suscribete:</label>
            <div class="col-sm-8 my-1 email-form">
                <label class="sr-only" for="inlineFormInputName">Email</label>
                <input type="text" class="form-control" id="inlineFormInputName" placeholder="Tu correo" name="mail">
            </div>
            <div class=" my-1">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>

        </form>
    </div>

<?php    
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filenameee =  "img/Cupon1SpeedFit.png";
    $fileName = "img/Cupon1SpeedFit.png"; 
    $email = $_POST['mail'];

    $message ="??Muy buenas! En el siguiente archivo adjunto se encuentra su cup??n:"; 
    
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
        
    }
            ?>
    <div class="alert alert-success" role="alert">
        Suscripcion realizada! Revisa tu correo.
    </div>
    <?php            
            }             
     ?>
    <div class="thanks">
        <h1>GRACIAS POR VISITARNOS. DISFUTE SU COMPRA</h1>
    </div>

    <?php

include "footer/index.html"
?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>
