<?php

class ControladorVentas {

    // Mostrar todas las ventas registradas
    public static function ctrObtenerVentas() {
        return ModeloVentas::obtenerVentas();
    }

    // Mostrar productos disponibles
    public static function ctrObtenerProductos() {
        return ModeloVentas::obtenerProductos();
    }

    // Registrar una nueva venta
    public static function ctrRegistrarVenta() {
        if (
            isset($_POST['producto_id']) &&
            isset($_POST['cantidad']) &&
            isset($_POST['precio_unitario']) &&
            isset($_SESSION['id_usuario'])
        ) {
            $producto_id = $_POST['producto_id'];
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];
            $usuario_id = $_SESSION['id_usuario'];

            if ($cantidad > 0 && $precio_unitario > 0) {
                $ok = ModeloVentas::registrarVenta($producto_id, $usuario_id, $cantidad, $precio_unitario);

                if ($ok) {
                    echo "<script>
                        alert('Venta registrada correctamente.');
                        window.location = 'index.php?paginas=ventas';
                    </script>";
                } else {
                    echo "<script>alert('Error al registrar la venta.');</script>";
                }

                exit();
            } else {
                echo "<script>
                    alert('La cantidad y el precio deben ser mayores a 0.');
                </script>";
            }
        }
    }
}

