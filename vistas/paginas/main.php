<main id="main" class="main mt-5"> <!-- mt-5 = margin-top: 3rem -->

  <!-- Título de Página -->
  <div class="pagetitle">
    <h1>Panel Principal - Heladería</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item active">
          <?php 
            echo isset($_GET["paginas"]) ? ucfirst($_GET["paginas"]) : "Inicio";
          ?>
        </li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <!-- Sección principal -->
  <section class="section dashboard">
    <div class="row">

      <?php
        if(session_status() == PHP_SESSION_NONE) session_start();

        // Lista blanca de rutas válidas
        $rutasPermitidas = ["home", "menu" ,"ventas", "inventario", "reportes", "usuarios", "salir"];

        if (isset($_GET["paginas"])) {

          $ruta = $_GET["paginas"];

          if (in_array($ruta, $rutasPermitidas)) {
            include_once "vistas/paginas/" . $ruta . ".php";
          } else {
            include "vistas/paginas/404.php";
          }

        } else {
          include "vistas/paginas/home.php"; // Página por defecto
        }
      ?>

    </div>
  </section>

</main><!-- End #main -->
