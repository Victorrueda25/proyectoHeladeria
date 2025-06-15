<?php

require_once "modelos/conexion.php"; 
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";

require_once "controladores/ventas.controlador.php";
require_once "controladores/login.controlador.php";
require_once "controladores/plantilla.controlador.php";





$plantilla = new ControladorPlantilla();
$plantilla->ctrMostrarPlantilla();
