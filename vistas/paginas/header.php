<header id="header" class="header fixed-top d-flex align-items-center bg-light shadow-sm">

  <!-- Logo y Nombre -->
  <div class="d-flex align-items-center justify-content-between px-3">
    <a href="index.php" class="logo d-flex align-items-center text-decoration-none">
      <img src="assets/img/helado-logo.png" alt="Logo Heladería" style="height: 40px;">
      <span class="d-none d-lg-block ms-2 fw-bold text-primary">Capsutilas de Fe y Sabor</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn ms-3 fs-4 text-secondary"></i>
  </div>

  <!-- Barra de Búsqueda -->
  <div class="search-bar d-flex align-items-center ms-4">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" class="form-control form-control-sm" placeholder="Buscar..." title="Buscar producto o venta">
      <button type="submit" class="btn btn-sm btn-outline-primary ms-1" title="Buscar">
        <i class="bi bi-search"></i>
      </button>
    </form>
  </div>

  <!-- Menú derecho (íconos de usuario, alertas, etc) -->
  <nav class="header-nav ms-auto me-3">
    <ul class="d-flex align-items-center mb-0">
      <!-- Ícono Usuario -->
      <li class="nav-item dropdown pe-2">
        <a class="nav-link nav-profile d-flex align-items-center" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/user.png" alt="Perfil" class="rounded-circle" style="width: 32px;">
          <span class="d-none d-md-block ps-2">Admin</span>
        </a>
      </li>
    </ul>
  </nav>

</header>
