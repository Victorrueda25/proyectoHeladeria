<?php
$moduloActivo = 'ventas';
$productos = ModeloVentas::obtenerProductos();
?>

<div class="container py-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">🍧 Realizar Pedido</h3>
        </div>
        <div class="card-body">
            <p>Bienvenido, <strong><?= $_SESSION['usuario'] ?></strong></p>

            <!-- Sección de selección de producto -->
            <div class="row g-3 align-items-end" id="form-producto">
                <div class="col-md-4">
                    <label class="form-label">Producto</label>
                    <select id="producto_id" class="form-select" required>
                        <option value="">Seleccione un producto</option>
                        <?php foreach ($productos as $producto): ?>
                            <option 
                                value="<?= $producto['id_productos'] ?>"
                                data-precio="<?= $producto['precio_productos'] ?>"
                                data-imagen="<?= $producto['imagen_productos'] ?>"
                            >
                                <?= $producto['nombre_productos'] ?>
                            </option>
                        <?php endforeach; ?>
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
                <img id="previewImagen" src="" width="100" alt="Imagen del producto">
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

<!-- JS para funcionalidad -->
<script>
    const productos = <?= json_encode($productos) ?>;
    const tablaPedido = document.querySelector("#tablaPedido tbody");
    let pedido = [];

    document.getElementById("producto_id").addEventListener("change", function () {
        const selected = this.options[this.selectedIndex];
        const precio = selected.dataset.precio || "";
        const imagen = selected.dataset.imagen || "";
        document.getElementById("precio_unitario").value = precio;

        if (imagen) {
            document.getElementById("previewImagen").src = "bdImagenes/" + imagen;
            document.getElementById("imagenProductoSeleccionado").style.display = "block";
        } else {
            document.getElementById("imagenProductoSeleccionado").style.display = "none";
        }
    });

    document.getElementById("agregarProducto").addEventListener("click", () => {
        const select = document.getElementById("producto_id");
        const id = select.value;
        const nombre = select.options[select.selectedIndex].text;
        const precio = parseFloat(document.getElementById("precio_unitario").value);
        const cantidad = parseInt(document.getElementById("cantidad").value);

        if (!id || !precio || cantidad <= 0) return alert("Datos inválidos");

        // Agregar al pedido
        pedido.push({ id, nombre, precio, cantidad });

        actualizarTablaPedido();
    });

    function actualizarTablaPedido() {
        tablaPedido.innerHTML = "";
        let total = 0;

        pedido.forEach((item, index) => {
            const subtotal = item.precio * item.cantidad;
            total += subtotal;

            tablaPedido.innerHTML += `
                <tr>
                    <td>${item.nombre}</td>
                    <td>${item.cantidad}</td>
                    <td>$ ${item.precio.toFixed(2)}</td>
                    <td>$ ${subtotal.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">X</button></td>
                </tr>`;
        });

        document.getElementById("totalPedido").textContent = `$ ${total.toFixed(2)}`;
    }

    function eliminarProducto(index) {
        pedido.splice(index, 1);
        actualizarTablaPedido();
    }

    document.getElementById("btnRegistrarVenta").addEventListener("click", () => {
        if (pedido.length === 0) return alert("Debe agregar al menos un producto");

        // Enviar al backend con AJAX o form dinámico (esto se puede programar)
        alert("Aquí se enviaría el pedido completo a PHP para registrar la venta");
    });
</script>
