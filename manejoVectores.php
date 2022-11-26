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
    </div>

</body>

</html>
    
</body>

</html>

