<?php
// Leer el inventario del archivo JSON
$inventario = json_decode(file_get_contents("inventario.json"), true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Inventario</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tabla-inventario">
            <?php foreach ($inventario as $helado): ?>
                <tr>
                    <td><?= $helado["nombre"] ?></td>
                    <td id="cantidad-<?= $helado["id"] ?>"><?= $helado["cantidad"] ?></td>
                    <td>
                        <button class="sumar" data-id="<?= $helado["id"] ?>">+</button>
                        <button class="restar" data-id="<?= $helado["id"] ?>">-</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="inventario.js"></script>
</body>
</html>
