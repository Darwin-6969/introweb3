<?php

session_start();

// Verificar que el carrito tenga productos
if (
    !isset($_SESSION['carrito']) ||
    empty($_SESSION['carrito'])
) {
    header('Location: carrito.php');
    exit;
}

$total = 0;
$cantidadProductos = 0;

// Calcular total de la compra
foreach ($_SESSION['carrito'] as $producto) {

    $total +=
        $producto['precio']
        * $producto['cantidad'];

    $cantidadProductos +=
        $producto['cantidad'];
}

// Guardar información de la compra
$_SESSION['ultima_compra'] = [
    'total' => $total,
    'cantidad' => $cantidadProductos,
    'fecha' => date('d/m/Y H:i:s')
];

// Vaciar carrito después de completar la compra
$_SESSION['carrito'] = [];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Compra realizada</title>

    <link rel="stylesheet" href="estilos.css">

</head>

<body>

<header class="header">

    <div class="contenedor header-contenido">

        <h1>🏠 ElectroHogar PHP</h1>

        <a
            href="index.php"
            class="boton carrito-link"
        >
            Volver a la Tienda
        </a>

    </div>

</header>


<main class="contenedor">

    <section class="carrito compra-exitosa">

        <div class="icono-exito">
            ✓
        </div>

        <h2>
            ¡Compra realizada correctamente!
        </h2>

        <p>
            Gracias por realizar tu compra en ElectroHogar PHP.
        </p>


        <div class="resumen-compra">

            <p>
                <strong>
                    Productos comprados:
                </strong>

                <?php
                echo $cantidadProductos;
                ?>
            </p>

            <p>
                <strong>
                    Total pagado:
                </strong>

                <span class="total">
                    $<?php
                    echo number_format(
                        $total,
                        2
                    );
                    ?>
                </span>
            </p>

            <p>
                <strong>
                    Fecha:
                </strong>

                <?php
                echo $_SESSION['ultima_compra']['fecha'];
                ?>
            </p>

        </div>


        <a
            href="index.php"
            class="boton boton-agregar"
        >
            🏠 Volver a la Tienda
        </a>

    </section>

</main>


<footer>

    <p>
        ElectroHogar PHP &copy; <?php echo date('Y'); ?>
    </p>

</footer>

</body>

</html>