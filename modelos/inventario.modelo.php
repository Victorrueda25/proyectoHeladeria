<?php


function obtenerProductos() {
    $conexion = conectar();
    $sql = "SELECT id, nombre, precio FROM productos";
    $resultado = $conexion->query($sql);
    $productos = [];

    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }

    $conexion->close();
    return $productos;
}
