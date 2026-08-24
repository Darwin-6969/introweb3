<?php

session_start();

// Eliminar únicamente el carrito
unset($_SESSION['carrito']);

// Crear nuevamente un carrito vacío
$_SESSION['carrito'] = [];

// Regresar al carrito
header('Location: carrito.php');
exit;
