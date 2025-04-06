<?php
require_once __DIR__ . '/../utils/autenticacion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="login-container">
    <h1>🍦 Menú Principal</h1>
    <p>Bienvenido, <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong></p>

    <div class="botones">
        <a href="ventas.vista.php"><button>🛒 Registrar Ventas</button></a>
        <a href="inventario.vista.php"><button>📦 Inventario</button></a>
        <a href="reportes.vista.php"><button>📊 Reportes</button></a>
        <a href="../controladores/cerrar_sesion.controlador.php"><button style="background-color: #dc3545;">🔒 Cerrar Sesión</button></a>
    </div>
</div>

</body>
</html>
