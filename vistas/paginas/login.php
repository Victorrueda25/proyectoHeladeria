<?php
if (!isset($_SESSION)) session_start();
require_once "controladores/login.controlador.php";

// Ejecutar la validación ANTES de imprimir HTML
$mensajeError = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensajeError = ControladorLogin::ctrLoginUsuario() ?? null;
}

// Si ya inició sesión, redirigir automáticamente
if (isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] === "ok") {
    header("Location: index.php?paginas=home");
    exit();
}
?>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <!-- Logo del sistema -->
            <div class="d-flex justify-content-center py-4">
              <a href="index.php" class="logo d-flex align-items-center w-auto text-decoration-none">
                <img src="bdimagenes/logoHeladeria.png" alt="Logo Heladería" style="height: 40px;">
                <span class="d-none d-lg-block ms-2 fs-4 fw-bold text-primary">Helados Caseros</span>
              </a>
            </div>

            <div class="card shadow-sm">

              <div class="card-body">

                <div class="pt-4 pb-2 text-center">
                  <h5 class="card-title fs-4">Inicio de Sesión</h5>
                  <p class="text-muted small">Ingrese su correo y contraseña para acceder</p>
                </div>

                <!-- Mensaje de error -->
                <?php if (!empty($mensajeError)): ?>
                  <div class="alert alert-danger text-center py-1 mb-2" role="alert">
                    <?= $mensajeError ?>
                  </div>
                <?php endif; ?>

                <!-- Formulario de inicio -->
                <form class="row g-3 needs-validation" action="index.php?paginas=login&action=verify" method="POST" novalidate>

                  <div class="col-12">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="correo_usuario" class="form-control" id="email" required autocomplete="username">
                      <div class="invalid-feedback">Por favor, ingresa tu correo.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="clave_usuario" class="form-control" id="password" required autocomplete="current-password">
                    <div class="invalid-feedback">Por favor, ingresa tu contraseña.</div>
                  </div>




                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Recordarme</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Ingresar</button>
                  </div>

                  <div class="col-12">
                    <p class="small mb-0">¿No tienes una cuenta? <a href="#">Solicitar acceso</a></p>
                  </div>

                </form>
                <!-- Fin del formulario -->

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main>
