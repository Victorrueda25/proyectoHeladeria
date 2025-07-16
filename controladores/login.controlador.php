<?php

require_once "modelos/usuarios.modelo.php";

class ControladorLogin {

    public static function ctrLoginUsuario() {
        // Iniciar sesión si aún no está activa
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Validar campos
        if (!isset($_POST['correo_usuario']) || !isset($_POST['clave_usuario'])) {
            return "Todos los campos son obligatorios";
        }

        $correo = $_POST['correo_usuario'];
        $claveIngresada = $_POST['clave_usuario'];

        // Buscar usuario por correo o nombre de usuario
        $usuario = ModeloRegistro::mdlObtenerUsuario('usuarios', $correo);

        if ($usuario) {
            $claveAlmacenada = $usuario['clave_usuario'];

            // Comparar con SHA1
            if (sha1($claveIngresada) === $claveAlmacenada) {
                self::iniciarSesion($usuario);
                return null;
            }

            return "Contraseña incorrecta";
        }

        return "Usuario no encontrado";
    }

    private static function iniciarSesion($usuario) {
        $_SESSION['validarIngreso'] = 'ok';
        $_SESSION['usuario'] = $usuario['nombre_usuario'];
        $_SESSION['id_usuario'] = $usuario['pers_id'];
        $_SESSION['rol'] = $usuario['rol_id_usuario'] ?? null;

        header("Location: index.php?paginas=home");
        exit();
    }
}
