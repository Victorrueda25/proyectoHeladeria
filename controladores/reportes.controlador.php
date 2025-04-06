<?php
require_once __DIR__ . '/../modelos/ventas.modelo.php';
require_once __DIR__ . '/../modelos/reportes.modelo.php';

$ventas = obtenerVentas();
$reporte = [];
$mensaje = '';
$total = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];

    $hoy = date('Y-m-d');
    $inicio = '';
    $fin = date('Y-m-d 23:59:59');

    switch ($tipo) {
        case 'diario':
            $inicio = date('Y-m-d 00:00:00');
            $mensaje = 'Reporte Diario';
            break;
        case 'semanal':
            $inicio = date('Y-m-d 00:00:00', strtotime('monday this week'));
            $mensaje = 'Reporte Semanal';
            break;
        case 'mensual':
            $inicio = date('Y-m-01 00:00:00');
            $mensaje = 'Reporte Mensual';
            break;
        case 'general':
            $reporte = $ventas;
            $mensaje = 'Reporte General';
            break;
    }

    if ($tipo !== 'general') {
        $reporte = filtrarVentasPorRango($ventas, $inicio, $fin);
    }

    $total = totalizarVentas($reporte);
}
