<?php


$productos = ControladorInventario::ctrMostrarInventario();
?>


<?php if (isset($productos) && is_array($productos)): ?>
    <!--  Agregar nuevo productos -->
    <div class="contenedor-inventario">

        <h2>Gestión de Inventario</h2>

        <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] == 1): ?>
            <div class="botones-inventario">

                <button id="btn-nuevo-producto">➕ Agregar Nuevo Helado</button>
            </div>
            <div id="formulario-nuevo" class="formulario-inventario oculto contenedor-agregar-producto">
                <h3>Registrar Nuevo Sabor</h3>
                <form id="form-agregar-producto" enctype="multipart/form-data" method="POST">
                    <label for="nombre_productos">Nombre del producto:</label>
                    <input type="text" id="nombre_productos" name="nombre_productos" placeholder="Ej: Helado de fresa" required>

                    <label for="precio_productos">Precio del producto:</label>
                    <input type="number" id="precio_productos" name="precio_productos" placeholder="Ej: 5000" required>

                    <label for="stock_productos">Stock disponible:</label>
                    <input type="number" id="stock_productos" name="stock_productos" placeholder="Ej: 20" required>

                    <label for="imagen_productos">Imagen del producto:</label>
                    <input type="file" id="imagen_productos" name="imagen_productos" accept="image/*" required>

                    <button type="submit">Registrar Producto</button>
                </form>

            </div>
        <?php endif; ?>


        <!-- Mostrar productos -->
        <div class="grid-inventario">
            <?php foreach ($productos as $producto): ?>
                <div class="card-producto">

                    <img src="bdImagenes/<?= htmlspecialchars($producto['imagen_productos']) ?>"
                        alt="<?= htmlspecialchars($producto['nombre_productos']) ?>">

                    <div class="info-producto">
                        
                        Precio: $<?= number_format($producto['precio_productos'], 2) ?><br>
                        Stock actual: <?= $producto['stock_productos'] ?>
                    </div>

                    <form method="POST" action="index.php?paginas=inventario&action=actualizarStock">
                        <p><strong><?= $producto['nombre_productos'] ?></strong></p> <!-- nombre visible -->

                        <input type="hidden" name="id" value="<?= $producto['id_productos'] ?>">

                        <label>Nuevo Stock:</label>
                        <input type="number" name="stock" min="0" value="<?= $producto['stock_productos'] ?>" required>

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

