<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: index.php");
    exit();
}

// Cargar el inventario
$inventario = json_decode(file_get_contents("inventario.json"), true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Helados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="contenedor-titulo">
    <h1 class="titulo">Registrar Venta</h1>
    <button class="btn-volver-ventas" onclick="window.location.href='menu.php'">Volver al Menú</button>
</div>

    <div class="contenedor">
        <div class="helados-container">
            <?php foreach ($inventario as $helado): ?>
                <div class="helado">
                    <img src="<?= $helado['imagen'] ?>" alt="Helado <?= $helado['nombre'] ?>">
                    <h3><?= $helado['nombre'] ?> - $ 2.50</h3>
                    <p>Stock Disponible: <span id="stock-<?= $helado['id'] ?>"><?= $helado['cantidad'] ?></span></p>
                    <input type="number" min="1" max="<?= $helado['cantidad'] ?>" value="1" class="cantidad">
                    <button class="agregar" data-id="<?= $helado['id'] ?>">Agregar</button>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="carrito-container">
            <h2>Registro de Venta</h2>
            <table class="tabla-carrito">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="lista-carrito"></tbody>
            </table>
            <h3 id="total-general">Total General: $0.00</h3>
            <button class="generar-venta">Generar Venta</button>
        </div>
    </div>

    <script src="ventas.js"></script>
</body>
</html>
