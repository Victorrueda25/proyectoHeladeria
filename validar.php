<?php
session_start();
ob_start(); // Evita salida antes de redirigir

$pin_correcto = "1234";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['pin'])) {
        $pin_ingresado = trim($_POST['pin']);

        if ($pin_ingresado === $pin_correcto) {
            $_SESSION['autenticado'] = true;
            header("Location: menu.php");
            ob_end_flush();
            exit();
        } else {
            header("Location: index.php?error=1");
            ob_end_flush();
            exit();
        }
    }
}
header("Location: index.php?error=2");
ob_end_flush();
exit();
?>
