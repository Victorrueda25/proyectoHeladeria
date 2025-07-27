<?php
session_start();
require_once "../../controladores/inventario.controlador.php";
require_once "../../modelos/inventario.modelo.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
        echo "No autorizado.";
        return;
    }

    $nombre = $_POST["nombre_productos"] ?? "";
    $precio = $_POST["precio_productos"] ?? "";
    $stock  = $_POST["stock_productos"] ?? "";
    $imagen = $_FILES["imagen_productos"] ?? null;

    if ($nombre && $precio && $stock && $imagen) {
        $respuesta = ControladorInventario::ctrAgregarProducto($nombre, $precio, $stock, $imagen);
        echo $respuesta;
    } else {
        echo "Faltan datos del producto.";
    }
}


