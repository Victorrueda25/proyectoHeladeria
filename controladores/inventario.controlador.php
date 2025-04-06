<?php

require_once __DIR__ . '/../modelos/inventario.modelo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $stock = intval($_POST['stock']);
    
    if ($id > 0 && $stock >= 0) {
        actualizarStock($id, $stock);
    }

    header("Location: ../vistas/inventario.vista.php");
    exit();
}
