<?php

require_once __DIR__ . '/../utils/funciones_json.php';

function obtenerUsuarios() {
    return leerJSON(__DIR__ . '/../datos/usuarios.json');
}

function validarUsuario($usuario, $clave) {
    $usuarios = obtenerUsuarios();
    foreach ($usuarios as $u) {
        if ($u['usuario'] === $usuario && $u['clave'] === $clave) {
            return true;
        }
    }
    return false;
}
