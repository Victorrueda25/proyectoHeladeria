<?php
require_once "controladores/inventario.controlador.php";
$productos = ControladorInventario::ctrMostrarInventario();
?>

<?php if (isset($productos) && is_array($productos)): ?>

<div class="contenedor-inventario">

    <h2>Gestión de Inventario</h2>

    <div class="grid-inventario">
        <?php foreach ($productos as $producto): ?>
            <div class="card-producto">
                <img src="bdImagenes/<?= htmlspecialchars($producto['imagen_productos']) ?>" alt="<?= htmlspecialchars($producto['nombre_productos']) ?>">

                <div class="info-producto">
                    <strong><?= htmlspecialchars($producto['nombre_productos']) ?></strong><br>
                    Precio: $<?= number_format($producto['precio_productos'], 2) ?><br>
                    Stock actual: <?= $producto['stock_productos'] ?>
                </div>

                <form method="POST" action="index.php?paginas=inventario&action=actualizarStock">
                    <input type="hidden" name="id_productos" value="<?= $producto['id_productos'] ?>">
                    <input type="number" name="stock_productos" min="0" value="<?= $producto['stock_productos'] ?>" required>
                    <button type="submit">Actualizar</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="boton-volver">
        <a href="index.php?ruta=menu" class="btn-volver">Volver al menú</a>
    </div>

</div>

<?php else: ?>
    <p>No hay productos disponibles en el inventario.</p>
<?php endif; ?>
