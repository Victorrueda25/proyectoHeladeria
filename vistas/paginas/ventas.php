<?php
$moduloActivo = 'ventas';

$productos = ControladorVentas::ctrObtenerProductos();

?>


<div class="container py-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"> 🍧 Realizar Pedido</h3>
        </div>
        <div class="card-body">
            <p>Bienvenido Administrador,
                <strong><?= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado' ?></strong></p>

            <!-- Sección de selección de producto -->
            <div class="row g-3 align-items-end" id="form-producto">
                <div class="col-md-4">
                    <label class="form-label">Producto</label>
                    <select id="producto_id" class="form-select" required>
                        <option value="">Seleccione un producto</option>
                        <?php if (!empty($productos) && is_array($productos)): ?>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?= htmlspecialchars($producto['id_productos']) ?>"
                                    data-precio="<?= htmlspecialchars($producto['precio_productos']) ?>"
                                    data-imagen="<?= htmlspecialchars($producto['imagen_productos']) ?>">
                                    <?= htmlspecialchars($producto['nombre_productos']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay productos disponibles</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Cantidad</label>
                    <input type="number" id="cantidad" class="form-control" min="1" value="1" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Precio</label>
                    <input type="text" id="precio_unitario" class="form-control" readonly>
                </div>

                <div class="col-md-2">
                    <button type="button" id="agregarProducto" class="btn btn-success w-100">Agregar</button>
                </div>
            </div>

            <!-- Imagen del producto seleccionado -->
            <div class="mt-3" id="imagenProductoSeleccionado" style="display:none;">
                <img id="previewImagen" src="" width="200" alt="Imagen del producto">
            </div>

            <!-- Tabla del pedido -->
            <div class="mt-4">
                <h5>🧾 Detalle del Pedido</h5>
                <table class="table table-bordered" id="tablaPedido">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total:</th>
                            <th id="totalPedido">$0.00</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>




                <button class="btn btn-primary mt-2" id="btnRegistrarVenta">Generar Venta</button>
                <a href="index.php?paginas=home" class="btn btn-outline-secondary mt-2 ms-2">← Volver</a>
            </div>
        </div>
    </div>
</div>

                <script>
                    const productosDesdePHP = <?= json_encode($productos) ?>;
                </script>
                <script src="vistas/js/ventas.js"></script>