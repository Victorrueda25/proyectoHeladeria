<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Llama la función que registra la venta si viene POST
ControladorVentas::ctrRegistrarVenta();

// Obtiene el usuario desde la sesión o pone Invitado
$usuario = $_SESSION['usuario'] ?? 'Invitado';

// Carga la plantilla HTML
$html = file_get_contents(__DIR__ . '/html/ventas.html');
if ($html === false) {
    die("Error: No se pudo cargar la plantilla ventas.html");
}

// Obtiene productos para el select
$productos = ControladorVentas::ctrObtenerProductos();
$opciones = '';
foreach ($productos as $producto) {
    $opciones .= '<option value="' . htmlspecialchars($producto['id']) . '">'
        . htmlspecialchars($producto['nombre']) . ' ($' . number_format($producto['precio'], 2) . ')</option>';
}

// Reemplaza las opciones de productos
$html = str_replace('{{opciones_productos}}', $opciones, $html);

// Reemplaza el nombre del usuario
$html = str_replace('{{usuario}}', htmlspecialchars($usuario), $html);

// Obtiene las ventas para la tabla
$ventas = ControladorVentas::ctrObtenerVentas();
$tabla = '';
foreach ($ventas as $venta) {
    $tabla .= '<tr>
        <td>' . htmlspecialchars($venta["id"]) . '</td>
        <td>' . htmlspecialchars($venta["producto"]) . '</td>
        <td>' . htmlspecialchars($venta["cantidad"]) . '</td>
        <td>$' . number_format($venta["precio_unitario"], 2) . '</td>
        <td>$' . number_format($venta["total"], 2) . '</td>
        <td>' . htmlspecialchars($venta["fecha"]) . '</td>
    </tr>';
}
// Reemplaza la tabla en el HTML
$html = str_replace('{{tabla_ventas}}', $tabla, $html);

// Muestra la página final
echo $html;
