<?php

class ControladorLogin {

    public static function ctrLoginUsuario() {
        session_start(); // ✅ Muy importante para que funcione $_SESSION

        if (isset($_POST['pers_correo']) && isset($_POST['pers_contrasena'])) {
            $usuario = $_POST['pers_correo'];
            $password = $_POST['pers_contrasena'];

            $respuesta = ModeloRegistro::mdlObtenerUsuario('usuarios', $usuario);

            if ($respuesta) {
                if ($password === $respuesta['pers_contrasena']) {
                    $_SESSION['validarIngreso'] = 'ok';
                    $_SESSION['usuario'] = $respuesta['pers_nombre'];
                    header('Location: index.php?paginas=home');
                    exit();
                } else {
                    $_SESSION["login_error"] = "Contraseña incorrecta";
                    header("Location: index.php");
                    exit();
                }
            } else {
                $_SESSION["login_error"] = "Usuario no encontrado";
                header("Location: index.php");
                exit();
            }
        }
    }
}
