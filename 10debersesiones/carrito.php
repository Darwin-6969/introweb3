<?php

session_start();

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header class="header">
    <div class="contenedor header-contenido">

        <h1>🛒 Mi Carrito</h1>

        <a href="index.php" class="boton">
            ← Volver al Catálogo
        </a>

    </div>
</header>

<main class="contenedor">

    <section class="carrito">

        <h2>Productos seleccionados</h2>

        <?php if (empty($_SESSION['carrito'])): ?>

            <div class="carrito-vacio">

                <div class="icono-vacio">🛒</div>

                <h3>Tu carrito está vacío</h3>

                <p>
                    Todavía no has agregado ningún producto.
                </p>

                <a href="index.php" class="boton boton-agregar">
                    Ir al Catálogo
                </a>

            </div>

        <?php else: ?>

            <div class="tabla-contenedor">

                <table>

                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($_SESSION['carrito'] as $producto): ?>

                        <?php
                        $subtotal = $producto['precio'] * $producto['cantidad'];
                        $total += $subtotal;
                        ?>

                        <tr>

                            <td>
                                <?php echo htmlspecialchars($producto['nombre']); ?>
                            </td>

                            <td>
                                $<?php echo number_format($producto['precio'], 2); ?>
                            </td>

                            <td>
                                <span class="cantidad">
                                    <?php echo $producto['cantidad']; ?>
                                </span>
                            </td>

                            <td>
                                <strong>
                                    $<?php echo number_format($subtotal, 2); ?>
                                </strong>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                    <tfoot>

                        <tr>
                            <td colspan="3">
                                <strong>Total a pagar:</strong>
                            </td>

                            <td>
                                <strong class="total">
                                    $<?php echo number_format($total, 2); ?>
                                </strong>
                            </td>
                        </tr>

                    </tfoot>

                </table>

            </div>

            <div class="acciones">

                <a href="index.php" class="boton">
                    ← Seguir Comprando
                </a>

                <form action="vaciar.php" method="POST">

                    <button
                        type="submit"
                        class="boton boton-vaciar"
                        onclick="return confirm('¿Seguro que deseas vaciar el carrito?');"
                    >
                        🗑 Vaciar Carrito
                    </button>

                </form>

            </div>

        <?php endif; ?>

    </section>

</main>

<footer>
    <p>Mini Carrito de Compras &copy; <?php echo date('Y'); ?></p>
</footer>

</body>
</html>
