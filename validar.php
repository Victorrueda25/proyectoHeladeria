<?php
session_start();
ob_start(); // Asegura que no haya salida antes de los headers

$pin_correcto = "1234"; // Define el PIN correcto

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['pin'])) {
        $pin_ingresado = trim($_POST['pin']);

        if ($pin_ingresado === $pin_correcto) {
            $_SESSION['autenticado'] = true;
            header("Location: menu.php");
            ob_end_flush(); // Libera el buffer de salida
            exit();
        } else {
            header("Location: index.php?error=1");
            ob_end_flush();
            exit();
        }
    }
}

// Si no se recibe un PIN válido, redirige con error
header("Location: index.php?error=2");
ob_end_flush();
exit();
