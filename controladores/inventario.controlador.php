<?php

class ControladorInventario
{
    // Mostrar todos los productos (inventario)
    public static function ctrMostrarInventario()
    {
        return ModeloInventario::mdlMostrarInventario();
    }

    // Agregar nuevo producto
    public static function ctrAgregarProducto($nombre, $precio, $stock, $imagen)
    {
        $directorioRel = "vistas/img/productos/";
        $directorioAbs = dirname(__DIR__, 1) . "/$directorioRel";

        if (!is_dir($directorioAbs)) {
            mkdir($directorioAbs, 0755, true);
        }

        $nombreArchivo = uniqid() . "_" . basename($imagen["name"]);

        // ← CORREGIDO AQUÍ
        $rutaAbs = $directorioAbs . "/" . $nombreArchivo;

        $rutaRelQueGuardoEnBD = $directorioRel . $nombreArchivo;

        if (!is_uploaded_file($imagen["tmp_name"])) {
            return "El archivo no es válido o no fue subido correctamente.";
        }

        if (move_uploaded_file($imagen["tmp_name"], $rutaAbs)) {
            return ModeloInventario::mdlAgregarProducto($nombre, $precio, $stock, $rutaRelQueGuardoEnBD);
        } else {
            return "Error al mover la imagen al destino.";
        }
    }


    // Actualizar stock
    public static function ctrActualizarStock()
    {
        if (isset($_POST["id"], $_POST["stock"])) {
            $id = $_POST["id"];
            $nuevoStock = $_POST["stock"];

            if (is_numeric($nuevoStock) && $nuevoStock >= 0) {
                $respuesta = ModeloInventario::mdlActualizarStock($id, $nuevoStock);
                if ($respuesta) {
                    echo '<script>alert("Stock actualizado correctamente.");</script>';
                } else {
                    echo '<script>alert("Error al actualizar el stock.");</script>';
                }
                echo '<script>window.location = "index.php?ruta=inventario";</script>';
            }
        }
    }
}
