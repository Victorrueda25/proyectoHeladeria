<?php


class ControladorVentas {

    // Mostrar ventas (puede ser usado en la vista)
    public static function ctrObtenerVentas() {
        return ModeloVentas::obtenerVentas();
    }

    // Mostrar productos (para seleccionarlos en la venta)
    public static function ctrObtenerProductos() {
        return ModeloVentas::obtenerProductos();
    }

    // Registrar una venta desde un formulario POST
    public static function ctrRegistrarVenta() {
        if (
            isset($_POST['producto_id']) &&
            isset($_POST['cantidad']) &&
            isset($_POST['precio_unitario'])
        ) {
            $producto_id = $_POST['producto_id'];
            $cantidad = $_POST['cantidad'];
            $precio_unitario = $_POST['precio_unitario'];

            // Validación básica (opcional, puedes extenderla)
            if ($cantidad > 0 && $precio_unitario > 0) {
                ModeloVentas::registrarVenta($producto_id, $cantidad, $precio_unitario);

                // Redirección o mensaje de éxito
                echo "<script>
                    alert('Venta registrada correctamente.');
                    window.location = 'index.php?paginas=ventas';
                </script>";
                exit();
            } else {
                echo "<script>
                    alert('Los valores deben ser mayores a 0.');
                </script>";
            }
        }
    }
}
