<?php

session_start();
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Heladería - Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vistas/css/estilo.css">
</head>

<body>

    <div class="container-fluid">
        <div class="container py-5">

            <?php
            if (isset($_SESSION['validarIngreso']) && $_SESSION['validarIngreso'] === 'ok') {
                if (isset($_GET['paginas'])) {
                    if ($_GET['paginas'] == 'home') {
                        include "vistas/paginas/home.php";
                    } elseif ($_GET['paginas'] == 'ventas') {
                        include "vistas/paginas/ventas.php";
                    }
                    // puedes agregar más rutas aquí
                    else {
                        echo "Página no encontrada";
                    }
                } else {
                    include "vistas/paginas/home.php"; // vista por defecto si no se pasa 'paginas'
                }
            } else {
                include "vistas/paginas/login.php";
            }
            ?>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>