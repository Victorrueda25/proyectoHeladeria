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
    <title>Menú Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="menu-container">
        <h2>Menú Principal</h2>
        <div class="menu-buttons">
            <button onclick="location.href='ventas.php'">Registrar Venta</button>
            <button onclick="location.href='inventario.php'">Gestionar Inventario</button>
            <button onclick="location.href='reportes.php'">Generar Reportes</button>
            <button class="logout" onclick="location.href='cerrar_sesion.php'">Cerrar Sesión</button>
        </div>
    </div>
</body>
</html>
