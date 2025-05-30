<?php
require_once __DIR__ . '/../utils/autenticacion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>

<div class="menu-container">
    <h1> Menú Principal</h1>
    <p>Bienvenido, <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong></p>

    <a href="ventas.vista.php" class="btn btn-warning btn-menu">🛒 Registrar Ventas</a>
    <a href="inventario.vista.php" class="btn btn-success btn-menu">📦 Inventario</a>
    <a href="reportes.vista.php" class="btn btn-info btn-menu">📊 Reportes</a>
    <a href="../controladores/cerrar_sesion.controlador.php" class="btn btn-logout btn-menu">🔒 Cerrar Sesión</a>
</div>

<!-- Bootstrap JS opcional -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
