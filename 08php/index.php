<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    HOLA A TODOS <br>

    <?php
        echo "<b>Bienvenidos</b><br/>";

        $nombres = "Jose Luis";
        $edad = 48;
        $estatura = 1.7;
        $es_estudiante = true;

        echo "$nombres - $edad años - $estatura cm<br/>";

        $num1 = "250";
        $num2 = 60;

        $suma = $num1 + $num2;

        echo "Resultado: $suma<br/>";

        //Condicionales

        $num3 = 9;
        $num4 = 9;

        if ($num3 > $num4){
            echo "El mayor es: $num3";
        }
        elseif ($num3 < $num4){
            echo "El mayor es: $num4";
        }
        else{
            echo "Ambos numeros son iguales";
        }
        
    ?>

    <h2>Bucles</h2>
    <ul>
        <li>Ecuador</li>
        <li>Brasil</li>
        <li>Paraguay</li>
        <li>Colombia</li>

        <?php
        for ( $i= 1; $i <= 10; $i++ ){
            echo "<li>PAIS $i</li>";

        }
        ?>
    </ul>

    <h3>Tabla de multiplicar</h3>
        
        <table border="1">
            <?php
            $i = 1;
            $num = 5;
            while ($i <= 10){
            ?>
                <tr>
                    <td><?php echo $num; ?></td>
                    <td>*</td>
                    <td><?=$i?> </td>
                    <td>=</td>
                    <td><?=($i*$num)?></td>
                </tr>
    <?php
    $i++;
    }
    
    ?>

</body>
</html>