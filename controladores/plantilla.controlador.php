<?php

 

class ControladorPlantilla
{
    public function ctrMostrarPlantilla()
    {
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ControladorLogin::ctrLoginUsuario();
        }

        include "vistas/plantilla.php";
    }
}

