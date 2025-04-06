<?php
session_start();
require_once __DIR__ . '/../modelos/usuarios.modelo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    if (validarUsuario($usuario, $clave)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: ../vistas/menu.vista.php");
        exit();
    } else {
        $_SESSION['error_login'] = 'Usuario o contraseña incorrectos';
        header("Location: ../vistas/login.vista.php");
        exit();
    }
}
