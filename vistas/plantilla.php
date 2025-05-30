<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Heladería - Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="vistas/css/styles.css">
</head>
<body>

<!-- NAVBAR -->
<div class="container-fluid bg-light shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="nav nav-justified py-2 nav-pills w-100">
            <?php
            $paginas = ["registro", "ingreso", "inicio", "inventario", "salir"];
            $paginaActual = $_GET["pagina"] ?? "registro";

            foreach ($paginas as $pagina) {
                $activa = ($paginaActual == $pagina) ? "active" : "";
                echo "<li class='nav-item'>
                        <a class='nav-link $activa' href='index.php?pagina=$pagina'>" . ucfirst($pagina) . "</a>
                      </li>";
            }
            ?>
        </ul>
    </nav>
</div>

<!-- CONTENIDO -->
<div class="container-fluid">
    <div class="container py-5">
        <?php
        $paginasValidas = ["registro", "ingreso", "inicio", "inventario", "editar", "salir"];
        if (in_array($paginaActual, $paginasValidas)) {
            include "paginas/$paginaActual.php";
        } else {
            include "paginas/error404.php";
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>

</body>
</html>
