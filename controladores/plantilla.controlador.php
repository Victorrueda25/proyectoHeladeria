<?php

class ControladorPlantilla
{
    public function ctrMostrarPlantilla()
    {
        session_start();

        $error = null;

        // Aquí sí se procesa el formulario POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = ControladorLogin::ctrLoginUsuario();
        }

        // Mostrar la vista correcta
        if (isset($_SESSION['usuario'])) {
            include "html/menu.html";
        } else {
            include "vistas/paginas/login.php";
        }
    }
}
