<?php

require_once __DIR__ . '/../modelos/ventas.modelo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = $_POST['producto'] ?? '';
    $cantidad = $_POST['cantidad'] ?? 0;
    $precio = $_POST['precio'] ?? 0;

    if ($producto && $cantidad > 0 && $precio > 0) {
        registrarVenta($producto, $cantidad, $precio);
    }

    header('Location: ../vistas/ventas.vista.php');
    exit();
}
