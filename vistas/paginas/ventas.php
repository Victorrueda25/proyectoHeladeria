<?php


$moduloActivo = 'ventas';
$productos = ControladorVentas::ctrObtenerProductos();
?>

<div class="container py-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">🍧 Realizar Pedido</h3>
        </div>
        <div class="card-body">
            <p>Bienvenido Administrador,
                <strong><?= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Invitado' ?></strong>
            </p>

            <!-- 🧾 Formulario -->
            <form id="formVentas" action="index.php?paginas=ventas&action=registrar" method="POST">
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

                <!-- Input oculto donde va el JSON -->
                <input type="hidden" name="productos" id="inputProductos">

                <!-- Botones -->
                <button type="submit" class="btn btn-primary mt-2" id="btnRegistrarVenta">Generar Venta</button>
                <a href="index.php?paginas=home" class="btn btn-outline-secondary mt-2 ms-2">← Volver</a>
            </form>
        </div>
    </div>
</div>

<!-- 🔹 Cards de Productos -->
<div class="row mt-4" id="productosLista">
    <?php if (!empty($productos) && is_array($productos)): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-2 col-sm-4 col-6 mb-3">
                <div class="card h-100 shadow-sm producto-card" data-id="<?= $producto['id_productos'] ?>"
                    data-precio="<?= $producto['precio_productos'] ?>" data-nombre="<?= $producto['nombre_productos'] ?>"
                    data-imagen="vistas/assets/img/productos/<?= $producto['imagen_productos'] ?>">

                    <img src="vistas/assets/img/productos/<?= htmlspecialchars($producto['imagen_productos']) ?>"
                        alt="<?= htmlspecialchars($producto['nombre_productos']) ?>">

                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $producto['nombre_productos'] ?></h5>
                        <p class="card-text">💲 <?= number_format($producto['precio_productos'], 2) ?></p>
                        <input type="number" class="form-control mb-2 cantidadProducto" min="1" value="1">
                        <button type="button" class="btn btn-success w-100 btnAgregarCard">Agregar</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="vistas/js/ventas.js"></script>

<?php if (isset($_SESSION['venta_success'])): ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
    Swal.fire({
        icon: "success",
        title: "Venta registrada",
        html: `
            <b><?= $_SESSION['venta_success']['msg'] ?></b><br>
            ID Venta: <code><?= $_SESSION['venta_success']['idVenta'] ?></code><br>
            Total: <b><?= number_format($_SESSION['venta_success']['total'], 2) ?></b>
        `,
        showCancelButton: true,
        confirmButtonText: "🖨️ Imprimir factura",
        cancelButtonText: "🛒 Nueva venta"
    }).then((result) => {
        if (result.isConfirmed) {
            window.open("factura.php?id=<?= $_SESSION['venta_success']['idVenta'] ?>", "_blank");
        } else {
            window.location.href = "index.php?paginas=ventas";
        }
    });
});
</script>
<?php unset($_SESSION['venta_success']); ?>
<?php endif; ?>
