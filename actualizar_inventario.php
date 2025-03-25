<?php
// Leer y decodificar el JSON
$inventario = json_decode(file_get_contents("inventario.json"), true);
$datos = json_decode(file_get_contents("php://input"), true);

if (isset($datos["id"]) && isset($datos["accion"])) {
    foreach ($inventario as &$helado) {
        if ($helado["id"] == $datos["id"]) {
            if ($datos["accion"] == "sumar") {
                $helado["cantidad"]++;
            } elseif ($datos["accion"] == "restar" && $helado["cantidad"] > 0) {
                $helado["cantidad"]--;
            } else {
                echo json_encode(["success" => false]);
                exit();
            }
            file_put_contents("inventario.json", json_encode($inventario, JSON_PRETTY_PRINT));
            echo json_encode(["success" => true, "nuevaCantidad" => $helado["cantidad"]]);
            exit();
        }
    }
}

echo json_encode(["success" => false]);
?>
