<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: vistas/menu.vista.php");
} else {
    header("Location: vistas/login.vista.php");
}
exit();
