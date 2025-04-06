<?php
require_once __DIR__ . '/../utils/autenticacion.php';
require_once __DIR__ . '/../controladores/reportes.controlador.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reportes de Ventas</title>
    <style>
        .botones button {
            margin: 5px;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background: #f0f0f0;
        }
    </style>
</head>
<body>

<h2>📊 Reportes de Ventas</h2>

<form method="POST" class="botones">
    <button type="submit" name="tipo" value="diario">Reporte Diario</button>
    <button type="submit" name="tipo" value="semanal">Reporte Semanal</button>
    <button type="submit" name="tipo" value="mensual">Reporte Mensual</button>
    <button type="submit" name="tipo" value="general">Reporte General</button>
</form>

<?php if (!empty($mensaje)): ?>
    <h3><?= $mensaje ?></h3>
    <p><strong>Total de ventas:</strong> $<?= number_format($total, 2) ?></p>

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
        <?php foreach ($reporte as $venta): ?>
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
<?php endif; ?>

<br>
<a href="menu.vista.php">Volver al menú</a>

</body>
</html>
