<?php
require_once __DIR__ . '/../utils/autenticacion.php';
require_once __DIR__ . '/../modelos/inventario.modelo.php';

$productos = obtenerInventario();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <style>
        .producto {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            display: flex;
            align-items: center;
        }

        .producto img {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        .producto form {
            margin-left: auto;
        }
    </style>
</head>
<body>

<h2>Gestión de Inventario</h2>

<?php foreach ($productos as $producto): ?>
    <div class="producto">
        <img src="../bdImagenes/<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>">
        <div>
            <strong><?= htmlspecialchars($producto['nombre']) ?></strong><br>
            Stock: <?= $producto['stock'] ?>
        </div>
        <form method="POST" action="../controladores/inventario.controlador.php">
            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
            <input type="number" name="stock" min="0" value="<?= $producto['stock'] ?>" required>
            <button type="submit">Actualizar</button>
        </form>
    </div>
<?php endforeach; ?>

<br>
<a href="menu.vista.php">Volver al menú</a>

</body>
</html>
