<?php

require_once __DIR__ . '/../utils/funciones_json.php';

function obtenerInventario() {
    return leerJSON(__DIR__ . '/../datos/inventario.json');
}

function actualizarStock($id, $nuevoStock) {
    $ruta = __DIR__ . '/../datos/inventario.json';
    $productos = obtenerInventario();

    foreach ($productos as &$producto) {
        if ($producto['id'] == $id) {
            $producto['stock'] = $nuevoStock;
            break;
        }
    }

    escribirJSON($ruta, $productos);
}
