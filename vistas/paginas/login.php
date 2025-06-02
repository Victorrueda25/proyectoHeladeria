<?php

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = ControladorLogin::ctrLoginUsuario(); // Captura errores del controlador
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Heladería</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/login.css">
</head>

<body class="bg-light">

    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-md-5 bg-white p-5 border rounded shadow">
                <form method="POST" action="/proyectoHeladeria/index.php?paginas=login">
                    <h2 class="mb-4 text-center">Iniciar Sesión - Heladería</h2>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <?php
                    // Cargar y mostrar el formulario HTML desde archivo externo
                    $formulario = file_get_contents(__DIR__ . "/../../html/login.html");
                    echo $formulario;
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
