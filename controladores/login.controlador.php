<?php



class ControladorLogin {

    public static function ctrLoginUsuario() {
        if (isset($_POST['usuario']) && isset($_POST['pers_contrasena'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['pers_contrasena'];

            // Buscar usuario en la BD
            $respuesta = ModeloRegistro::mdlObtenerUsuario('usuarios', $usuario);

            if ($respuesta) {
                // Comparar directamente las contraseñas en texto plano (por ahora)
                if ($password === $respuesta['pers_contrasena']) {
                    session_start();
                    $_SESSION['iniciarSesion'] = 'ok';
                    $_SESSION['usuario'] = $respuesta['pers_nombre'];
                    header('Location: index.php?paginas=menu');
                    exit();
                } else {
                    return "Contraseña incorrecta";
                }
            } else {
                return "Usuario no encontrado";
            }
        }
        return null;
    }
}
