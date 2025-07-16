<?php

require_once "modelos/conexion.php"; 
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";

require_once "controladores/ventas.controlador.php";
require_once "controladores/login.controlador.php";
require_once "controladores/plantilla.controlador.php";


   // si está intentando iniciar sesión
if(
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["paginas"], $_GET["action"]) &&
    $_GET["paginas"] == "login" &&
    $_GET["action"] == "verify"
){
    $controllerLogin = new ControladorLogin();
    $controllerLogin->ctrLoginUsuario();
    exit; //evita que cargue la plantilla
}

// Si se está registrando una venta
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_GET["paginas"], $_GET["action"]) &&
    $_GET["paginas"] === "ventas" &&
    $_GET["action"] === "registrar"
) {
    require_once "controladores/ventas.controlador.php"; // Asegúrate de incluirlo si no lo tienes
    ControladorVentas::ctrRegistrarVenta();
    exit; // Evita cargar la plantilla
}





$plantilla = new ControladorPlantilla();
$plantilla->ctrMostrarPlantilla();
