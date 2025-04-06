<?php
require_once __DIR__ . '/../utils/autenticacion.php';
require_once __DIR__ . '/../modelos/ventas.modelo.php';

$ventas = obtenerVentas();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de Ventas</title>
    <style>
        .formulario {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<h2>Registrar Venta</h2>

<div class="formulario">
    <form method="POST" action="../controladores/ventas.controlador.php">
        <label>Producto:</label>
        <input type="text" name="producto" required>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" min="1" required>

        <label>Precio Unitario:</label>
        <input type="number" step="0.01" name="precio" min="0.01" required>

        <button type="submit">Registrar</button>
    </form>
</div>

<h3>Ventas Registradas</h3>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ventas as $venta): ?>
            <tr>
                <td><?= $venta['id'] ?></td>
                <td><?= htmlspecialchars($venta['producto']) ?></td>
                <td><?= $venta['cantidad'] ?></td>
                <td>$<?= number_format($venta['precio_unitario'], 2) ?></td>
                <td>$<?= number_format($venta['total'], 2) ?></td>
                <td><?= $venta['fecha'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="menu.vista.php">Volver al menú</a>

</body>
</html>
