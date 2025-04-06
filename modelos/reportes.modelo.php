<?php
require_once __DIR__ . '/ventas.modelo.php';

function filtrarVentasPorRango($ventas, $inicio, $fin) {
    return array_filter($ventas, function($venta) use ($inicio, $fin) {
        $fecha = strtotime($venta['fecha']);
        return $fecha >= strtotime($inicio) && $fecha <= strtotime($fin);
    });
}

function totalizarVentas($ventas) {
    $total = 0;
    foreach ($ventas as $venta) {
        $total += $venta['total'];
    }
    return $total;
}
