<?php

require_once "modelos/inventario.modelo.php";

class ControladorInventario
{

    // Mostrar todos los productos (inventario)
    public static function ctrMostrarInventario()
    {
        return ModeloInventario::mdlMostrarInventario();
    }



    // Actualizar stock
    public static function ctrActualizarStock()
    {
        if (isset($_POST["id"], $_POST["stock"])) {
            $id = $_POST["id"];
            $nuevoStock = $_POST["stock"];

            // Validación simple
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
