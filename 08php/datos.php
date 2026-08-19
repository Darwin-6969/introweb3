<?php

    $arreglo = ["ECUADOR","BOLIVIA","PERÚ"];

    echo "$arreglo[1]</br>";
    
    foreach ($arreglo as $pais) {
        echo "$pais </br>";
    }

    $registro = [
        "placa" => "PBA-1234",
        "tipo" => "Auto",
        "propietario" => "Carlos Ruiz"
    ];
    echo $registro["placa"]."</br>";

    foreach($registro as $clave => $valor){
        echo "- $clave: $valor<br/>";
    }
?>