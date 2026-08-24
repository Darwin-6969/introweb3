<?php

session_start();

// Crear el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verificar que los datos hayan sido enviados
if (
    isset($_POST['id']) &&
    isset($_POST['nombre']) &&
    isset($_POST['precio'])
) {
    $id = (int) $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = (float) $_POST['precio'];

    // Si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$id])) {

        // Aumentar la cantidad
        $_SESSION['carrito'][$id]['cantidad']++;

    } else {

        // Agregar producto nuevo
        $_SESSION['carrito'][$id] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1
        ];
    }
}

// Regresar al catálogo
header('Location: index.php');
exit;
