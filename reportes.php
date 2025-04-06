<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de Ventas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor-reportes">
        <!-- Contenedor derecho (Título y botón volver) -->
        <div class="reporte-header">
            <h2>Reportes de Ventas</h2>
            <button onclick="location.href='menu.php'" class="btn-volver-reporte">Volver al Menú</button>
        </div>

        <!-- Contenedor central (Botones de reportes) -->
        <div class="reporte-botones">
            <button class="btn-reporte diario">Ventas Diarias</button>
            <button class="btn-reporte semanal">Ventas Semanales</button>
            <button class="btn-reporte mensual">Ventas Mensuales</button>
            <button class="btn-reporte general">Reporte General</button>
        </div>

        <!-- Contenedor izquierdo (Imagen decorativa) -->
        <div class="reporte-imagen">
            <img src="bdImagenes/fotoMixtaHeladoStudio.png" alt="Imagen de Helados">
        </div>
    </div>
</body>
</html>
