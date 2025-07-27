<?php

require_once "modelos/conexion.php"; 
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/inventario.modelo.php";


require_once "controladores/ventas.controlador.php";
require_once "controladores/login.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/inventario.controlador.php";


   // si está intentando iniciar sesión
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["paginas"], $_GET["action"]) &&
    $_GET["paginas"] == "login" &&
    $_GET["action"] == "verify"
){
    $controllerLogin = new ControladorLogin();
    $controllerLogin->ctrLoginUsuario();
    exit; //
}

if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["paginas"], $_GET["action"]) &&
    $_GET["paginas"] == "inventario" &&
    $_GET["action"] == "agregarProducto"
) {
    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
        echo "No autorizado.";
        exit;
    }

    $nombre = $_POST["nombre_productos"] ?? "";
    $precio = $_POST["precio_productos"] ?? "";
    $stock  = $_POST["stock_productos"] ?? "";
    $imagen = $_FILES["imagen_productos"] ?? null;

    if ($nombre && $precio && $stock && $imagen) {
        $controllerInventario = new ControladorInventario();
        $respuesta = $controllerInventario->ctrAgregarProducto($nombre, $precio, $stock, $imagen);
        echo $respuesta;
    } else {
        echo "Faltan datos del producto.";
    }

    exit;
}


// Si está actualizando el stock del inventario
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["paginas"], $_GET["action"]) &&
    $_GET["paginas"] == "inventario" &&
    $_GET["action"] == "actualizarStock"
) {
    $controllerInventario = new ControladorInventario();
    $controllerInventario->ctrActualizarStock();
    exit; // Evita que se cargue la plantilla o vista nuevamente    
}


// Si se está registrando una venta
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["paginas"], $_GET["action"]) &&
    $_GET["paginas"] === "ventas" &&
    $_GET["action"] === "registrar"
) {
    $controllerVentas = new ControladorVentas();
    $controllerVentas->ctrRegistrarVenta();
    exit; // Evita que se cargue la plantilla o vista nuevamente
}







$plantilla = new ControladorPlantilla();
$plantilla->ctrMostrarPlantilla();
