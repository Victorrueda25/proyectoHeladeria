<!-- NAVBAR CON BOOTSTRAP -->
<section class="container-fluid bg-white shadow-sm mb-4">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">🍦 Heladería</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php?paginas=ventas" class="nav-link <?= ($moduloActivo == 'ventas') ? 'active' : '' ?>">🛒 Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?paginas=inventario" class="nav-link <?= ($moduloActivo == 'inventario') ? 'active' : '' ?>">📦 Inventario</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?paginas=reportes" class="nav-link <?= ($moduloActivo == 'reportes') ? 'active' : '' ?>">📊 Reportes</a>
                        </li>
                    </ul>
                    <span class="navbar-text me-3">
                        👤 Bienvenido, <strong><?= htmlspecialchars($_SESSION['usuario'] ?? 'Usuario') ?></strong>
                    </span>
                    <a href="vistas/paginas/salir.php" class="btn btn-outline-danger">🔒 Cerrar Sesión</a>
                </div>
            </div>
        </nav>
    </div>
</section>
