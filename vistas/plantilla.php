<?php
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Heladería - Sistema</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <link rel="stylesheet" href="vistas/css/estilo.css">
  
  <link rel="stylesheet" href="vistas/css/inventario.css">
  


</head>

<body>

<?php if (isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] === "ok"): ?>

  <?php
    $paginaActiva = $_GET["paginas"] ?? "home";
    $paginasPermitidas = ["home", "ventas", "inventario", "reportes", "usuarios", "salir"];
    if (!in_array($paginaActiva, $paginasPermitidas)) $paginaActiva = "home";
    $moduloActivo = $paginaActiva;
  ?>

  <?php include "paginas/header.php"; ?>

  <main id="main" class="main p-4 mt-5"> 
    <?php include "paginas/$paginaActiva.php"; ?>
  </main>

  <?php include "paginas/footer.php"; ?>

<?php else: ?>

  <?php include "paginas/login.php"; ?>

<?php endif; ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="vistas/js/inventario.js"></script>

</body>
</html>
