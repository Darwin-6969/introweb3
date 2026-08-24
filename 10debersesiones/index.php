<?php
session_start();

// Inicializar el carrito si todavía no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Catálogo de electrodomésticos
$productos = [
    1 => [
        'nombre' => 'Refrigeradora LG',
        'precio' => 899.99,
        'imagen' => 'https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=500'
    ],
    2 => [
        'nombre' => 'Lavadora Samsung',
        'precio' => 649.50,
        'imagen' => 'https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?w=500'
    ],
    3 => [
        'nombre' => 'Microondas Whirlpool',
        'precio' => 189.99,
        'imagen' => 'https://images.unsplash.com/photo-1574269909862-7e1d70bb8078?w=500'
    ],
    4 => [
        'nombre' => 'Televisor Smart TV',
        'precio' => 529.99,
        'imagen' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=500'
    ]
];

// Calcular cantidad total de productos
$cantidadCarrito = 0;

foreach ($_SESSION['carrito'] as $producto) {
    $cantidadCarrito += $producto['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroHogar PHP</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header class="header">
    <div class="contenedor header-contenido">

        <h1>🏠 ElectroHogar PHP</h1>

        <a href="carrito.php" class="boton carrito-link">
            Ver Carrito
            <span class="contador"><?php echo $cantidadCarrito; ?></span>
        </a>

    </div>
</header>

<main class="contenedor">

    <section class="hero">
        <h2>Electrodomésticos para tu hogar</h2>

        <p>
            Encuentra productos prácticos y modernos para hacer tu hogar más cómodo.
        </p>
    </section>

    <section class="productos">

        <?php foreach ($productos as $id => $producto): ?>

            <article class="producto">

                <img
                    src="<?php echo $producto['imagen']; ?>"
                    alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
                >

                <div class="producto-contenido">

                    <h3>
                        <?php echo htmlspecialchars($producto['nombre']); ?>
                    </h3>

                    <p class="precio">
                        $<?php echo number_format($producto['precio'], 2); ?>
                    </p>

                    <form action="agregar.php" method="POST">

                        <input
                            type="hidden"
                            name="id"
                            value="<?php echo $id; ?>"
                        >

                        <input
                            type="hidden"
                            name="nombre"
                            value="<?php echo htmlspecialchars($producto['nombre']); ?>"
                        >

                        <input
                            type="hidden"
                            name="precio"
                            value="<?php echo $producto['precio']; ?>"
                        >

                        <button type="submit" class="boton boton-agregar">
                            Agregar al Carrito
                        </button>

                    </form>

                </div>

            </article>

        <?php endforeach; ?>

    </section>

</main>

<footer>
    <p>
        ElectroHogar PHP &copy; <?php echo date('Y'); ?>
    </p>
</footer>

</body>
</html>