<?php
require_once __DIR__ . '/../../modelos/ventas.modelo.php';
session_start();

$usuario = $_SESSION['usuario'] ?? 'Invitado';
$productos = ModeloVentas::obtenerProductos();
$ventas = ModeloVentas::obtenerVentas();

// Cargar plantilla HTML
$html = file_get_contents(__DIR__ . '/ventas.html');

// Reemplazar {{usuario}}
$html = str_replace('{{usuario}}', htmlspecialchars($usuario), $html);

// Reemplazar {{opciones_productos}}
$opciones = '';
foreach ($productos as $prod) {
    $opciones .= '<option value="' . $prod['id'] . '">'
               . htmlspecialchars($prod['nombre']) . ' - $' . number_format($prod['precio'], 2)
               . '</option>';
}
$html = str_replace('{{opciones_productos}}', $opciones, $html);

// Reemplazar {{tabla_ventas}}
$tabla = '';
foreach ($ventas as $venta) {
    $tabla .= '<tr>'
            . '<td>' . $venta['id'] . '</td>'
            . '<td>' . htmlspecialchars($venta['producto']) . '</td>'
            . '<td>' . $venta['cantidad'] . '</td>'
            . '<td>$' . number_format($venta['precio_unitario'], 2) . '</td>'
            . '<td>$' . number_format($venta['total'], 2) . '</td>'
            . '<td>' . $venta['fecha'] . '</td>'
            . '</tr>';
}
$html = str_replace('{{tabla_ventas}}', $tabla, $html);

// Mostrar página final
echo $html;
