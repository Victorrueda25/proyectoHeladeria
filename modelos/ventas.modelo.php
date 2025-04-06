<?php

require_once __DIR__ . '/../utils/funciones_json.php';

function obtenerVentas() {
    return leerJSON(__DIR__ . '/../datos/ventas.json');
}

function registrarVenta($producto, $cantidad, $precioUnitario) {
    $ventas = obtenerVentas();
    $nuevaVenta = [
        "id" => count($ventas) + 1,
        "producto" => $producto,
        "cantidad" => intval($cantidad),
        "precio_unitario" => floatval($precioUnitario),
        "total" => floatval($cantidad) * floatval($precioUnitario),
        "fecha" => date("Y-m-d H:i:s")
    ];
    $ventas[] = $nuevaVenta;
    escribirJSON(__DIR__ . '/../datos/ventas.json', $ventas);
}
