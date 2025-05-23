<?php
session_start();
$error = $_SESSION['error_login'] ?? '';
unset($_SESSION['error_login']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos/login.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-4 bg-white p-4 border rounded shadow">
            <form method="POST" action="../controladores/login.controlador.php">
                <h2 class="mb-4 text-center">Iniciar Sesión</h2>

                <?php if ($error): ?>
                    <p class="alert alert-danger"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <input type="text" name="usuario" class="form-control mb-3" placeholder="Usuario" required>
                <input type="password" name="clave" class="form-control mb-3" placeholder="Contraseña" required>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
