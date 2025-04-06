<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: index.php");
    exit();
}

$inventario = json_decode(file_get_contents("inventario.json"), true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor-inventario">
        <h1>Gestión de Inventario</h1>
        <button onclick="location.href='menu.php'" class="btn-volver-inventario">Volver al Menú</button>
        <div class="inventario-container">
            <?php foreach ($inventario as $helado): ?>
                <div class="helado-item">
                    <img src="<?= $helado["imagen"] ?>" alt="<?= $helado["nombre"] ?>">
                    <h3><?= $helado["nombre"] ?></h3>
                    <p>Stock: <span id="stock-<?= $helado["id"] ?>"><?= $helado["cantidad"] ?></span></p>
                    <input type="number" id="nuevo-stock-<?= $helado["id"] ?>" min="0" placeholder="Nuevo stock">
                    <button class="actualizar-stock" data-id="<?= $helado["id"] ?>">Actualizar</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
