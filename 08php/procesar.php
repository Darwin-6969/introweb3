<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Datos Registrados:
    <br>
    <?php
        if (isset ($_POST["placa"])){
            echo $_POST["placa"]."<br/>";
            echo $_POST["tipo"];
        }else{
            echo "No hay datos...";
            ?>
                <a href="formulario.php">Regresar</a>
            <?php
                
        }
    ?>
</body>
</html>