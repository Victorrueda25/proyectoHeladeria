<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">🍦 Registrar Venta</h2>
        </div>
        <div class="card-body">
            <p>Bienvenido, <strong>{{usuario}}</strong></p>

            <form method="POST" action="index.php?paginas=ventas" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Producto:</label>
                    <select name="producto_id" class="form-control" required>
                        <option value="">Seleccione un producto</option>
                        {{opciones_productos}}
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Cantidad:</label>
                    <input type="number" name="cantidad" class="form-control" min="1" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Precio Unitario:</label>
                    <input type="number" name="precio_unitario" step="0.01" min="0.01" class="form-control" required>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4 card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">🧾 Ventas Registradas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
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
                        {{tabla_ventas}}
                    </tbody>
                </table>
            </div>
            <a href="/proyectoHeladeria/index.php?paginas=menu" class="btn btn-outline-primary mt-3">← Volver al menú</a>
        </div>
    </div>
</div>