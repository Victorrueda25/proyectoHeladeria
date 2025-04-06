<?php
session_start();
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    header("Location: menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <img src="bdImagenes/logoHeladeria.png" alt="Logo de la Heladería" class="logo">
        <h2>Ingrese su PIN</h2>

        <form action="validar.php" method="POST">
            <input type="password" name="pin" id="pin" placeholder="Ingrese su PIN" required>
            <button type="submit">Acceder</button>
        </form>

        <?php 
        if (isset($_GET['error']) && $_GET['error'] == 1) { 
            echo "<p class='error'>PIN incorrecto</p>"; 
        }
        ?>
    </div>
</body>
</html>
