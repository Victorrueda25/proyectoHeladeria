<?php
require_once __DIR__ . '/../utils/autenticacion.php';
require_once __DIR__ . '/../modelos/ventas.modelo.php';

$ventas = obtenerVentas();

// Leer el archivo HTML
$html = file_get_contents('../html/ventas.html');

// Reemplazar marcador {{usuario}}
$html = str_replace('{{usuario}}', htmlspecialchars($_SESSION['usuario']), $html);

// Construir la tabla de ventas
$filas = '';
foreach ($ventas as $venta) {
    $filas .= '<tr>';
    $filas .= '<td>' . $venta['id'] . '</td>';
    $filas .= '<td>' . htmlspecialchars($venta['producto']) . '</td>';
    $filas .= '<td>' . $venta['cantidad'] . '</td>';
    $filas .= '<td>$' . number_format($venta['precio_unitario'], 2) . '</td>';
    $filas .= '<td>$' . number_format($venta['total'], 2) . '</td>';
    $filas .= '<td>' . $venta['fecha'] . '</td>';
    $filas .= '</tr>';
}

// Reemplazar marcador {{tabla_ventas}}
$html = str_replace('{{tabla_ventas}}', $filas, $html);

// Mostrar el HTML procesado
echo $html;
?>
