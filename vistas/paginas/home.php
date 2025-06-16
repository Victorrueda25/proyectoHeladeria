<?php $moduloActivo = 'home'; ?>
<div class="container py-5">

  <div class="row mb-4">
    <div class="col-12">
      <h1 class="text-center text-primary">Panel Principal - Heladería</h1>
      <p class="text-center text-muted">Bienvenido al sistema de gestión de tu heladería</p>
    </div>
  </div>

  <div class="col-12">
    <div class="card shadow-sm border-0">
      <div class="card-body text-center">
        <h3 class="card-title text-primary mb-3">
          <?php echo $_SESSION["usuario"] ?? "Usuario"; ?>
        </h3>
        <p class="card-text fs-5">Selecciona una opción del menú para comenzar a gestionar tu heladería.</p>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card text-center h-100 shadow-sm">
        <div class="card-body">
          <i class="bi bi-cash-coin fs-1 text-success"></i>
          <h5 class="card-title mt-2">Registrar Ventas</h5>
          <p class="card-text">Accede al módulo de ventas para registrar productos vendidos.</p>
          <a href="index.php?paginas=ventas" class="btn btn-success btn-sm">Ir a Ventas</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center h-100 shadow-sm">
        <div class="card-body">
          <i class="bi bi-box-seam fs-1 text-warning"></i>
          <h5 class="card-title mt-2">Inventario</h5>
          <p class="card-text">Controla los productos disponibles y actualiza tu stock.</p>
          <a href="index.php?paginas=inventario" class="btn btn-warning btn-sm text-white">Ir a Inventario</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center h-100 shadow-sm">
        <div class="card-body">
          <i class="bi bi-graph-up-arrow fs-1 text-primary"></i>
          <h5 class="card-title mt-2">Reportes</h5>
          <p class="card-text">Consulta el resumen de ventas diarias, semanales o mensuales.</p>
          <a href="index.php?paginas=reportes" class="btn btn-primary btn-sm">Ir a Reportes</a>
        </div>
      </div>
    </div>
  </div>
</div>

