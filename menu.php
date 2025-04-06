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
    <title>Menú Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="menu-container">
        <!-- Contenedor del Logo -->
        <div class="logo-container">
            <img src="bdImagenes/logoHeladeria.png" alt="Logo de la Empresa">
        </div>

        <h2>Menú Principal</h2>
        <div class="menu-buttons">
            <button class="menu-opcion ventas" onclick="location.href='ventas.php'">Registrar Venta</button>
            <button class="menu-opcion inventario" onclick="location.href='inventario.php'">Gestionar Inventario</button>
            <button class="menu-opcion reportes" onclick="location.href='reportes.php'">Generar Reportes</button>
            <button class="menu-opcion logout" onclick="location.href='cerrar_sesion.php'">Cerrar Sesión</button>
        </div>
    </div>
</body>
</html>
