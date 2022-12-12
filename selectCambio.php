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

    <!-- Logica de seleccion del select xd-->
    <script>
            
        $(document).ready(function(){
            $('#pago1').hide();
            $('#pago2').hide();
            $('#myOptions').change(function() {
               
               
               // var displaycourse=$("#myOptions option:selected").text();
               // var displaycourse2=$("#myOptions").val(); //obtengo el id del producto seleccionado
                if($("#myOptions").val()==1){
                    $('#pago2').hide();
                    $('#pago').show();

                }else if($("#myOptions").val()==2){
                    $('#pago').hide();
                    $('#pago2').show();
                }
            });
        });
    </script>
</head>
  <body>
    
    
  
            
                <select id="myOptions" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='eliminar' >
                    <option value="1">opcion1</option>';
                    <option value="2">opcion2</option>';
                </select>

                <div id="pago" class="card" style="width: 18rem;"> 
                    <!-- dentro de este div poner la primer opcion a mostrar-->
                    <!-- dentro de este div poner la primer opcion a mostrar-->
                    <!-- dentro de este div poner la primer opcion a mostrar-->
                    <!-- dentro de este div poner la primer opcion a mostrar-->
                    <!-- dentro de este div poner la primer opcion a mostrar-->
                </div>
                <div id="pago2" class="card" style="width: 18rem;">
                    <!-- dentro de este div poner la segunda opcion a mostrar-->
                    <!-- dentro de este div poner la segunda opcion a mostrar-->
                    <!-- dentro de este div poner la segunda opcion a mostrar-->
                    <!-- dentro de este div poner la segunda opcion a mostrar-->
                    <!-- dentro de este div poner la segunda opcion a mostrar-->
                    
                </div>

</body>
</html>