<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <style>
        div {
            width: 40%;
            border: 1px solid black;
            margin: 0 auto;
            margin-top: 20px;
            padding: 15px;
            font-family: 'Ubuntu', sans-serif;
            text-align: center;
            line-height: 10px;
        }

        table,
        td {
            padding: 10px;
            text-align: center;
        }

    </style>

    <meta charset="UTF-8">
    <title>Vectores en PHP</title>
</head>

<body>
    <div>
        <h1>Alan Axel Escobar Calzada</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <table>
                <tr>
                    <td>Tamaño del vector:</td>
                    <td><input type="number" name="a" required></td>
                </tr>
                <tr>
                    <td>Limite inferior:</td>
                    <td><input type="number" name="min" required></td>
                <tr>
                <tr>
                    <td>Limite superior:</td>
                    <td><input type="number" name="max" required></td>
                <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Enviar"></td>
                </tr>
            </table>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
            function vector($a,$min,$max){
            for($x=0;$x<$a;$x++)
                    $r[$x]=rand($min,$max);
                return $r;
            }
                    
        
        $a = $_POST['a'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $chico = $_POST['max'];
        $grande = 0;
        $promedio = 0;
        $suma = 0;
                
        $vec=vector($a,$min,$max);//envia argumentos a funcion
        //Los arrays en php es altamente recomendable recorrerlos
        //con foreach
                
        $txt='<table border>';        
        foreach($vec as $x){
            if ($chico > $x){
                $chico = $x;
            }
            if ($grande < $x){
                $grande = $x;
            }
            $suma += $x;
            $txt.='<td style="color:purple;">'. $x .'</td>';
            $txt.='</td>';
        }
        $txt.='</table>';
        echo $txt;
                
        $promedio = $suma/$a;
        
        echo "<br>";
        echo "<p>El número más chico es: ".$chico."</p>";
        echo "<br>";
        echo "<p>El número más grande es: ".$grande."</p>";
        echo "<br>";
        echo "<p>El promedio es: ".$promedio."</p>";
        echo "<br><br>";
        asort($vec);        
        $txt='<table border>';        
        foreach($vec as $x){
            $txt.='<td style="color:darkviolet;">'. $x .'</td>';
            $txt.='</td>';
        }              
        $txt.='<td>Orden Ascendente</td></table>';
        echo $txt;
        echo "<br>";
        
        rsort($vec);        
        $txt='<table border>';        
        foreach($vec as $x){
            $txt.='<td style="color:darkviolet;">'. $x .'</td>';
            $txt.='</td>';
        }              
        $txt.='<td>Orden Descendiente</td></table>';
        echo $txt;
        echo "<br>";
                
        shuffle($vec);        
        $txt='<table border>';        
        foreach($vec as $x){
            $txt.='<td style="color:darkviolet;">'. $x .'</td>';
            $txt.='</td>';
        }              
        $txt.='<td>Shuffleados</td></table>';
        echo $txt;
        echo "<br>"; 
                
        shuffle($vec);        
        $txt='<table border>';        
        foreach($vec as $x){
            $txt.='<td style="color:magenta;">'. $x .'</td>';
            $txt.='</td>';
        }              
        $txt.='<td>Shuffle 2</td></table>';
        echo $txt;
        echo "<br>"; 
                
        shuffle($vec);        
        $txt='<table border>';        
        foreach($vec as $x){
            $txt.='<td style="color:purple;">'. $x .'</td>';
            $txt.='</td>';
        }              
        $txt.='<td>Shuffle 3</td></table>';
        echo $txt;
        echo "<br>"; 
        }
        ?>

    </div>

</body>

</html>
