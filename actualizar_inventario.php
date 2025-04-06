<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["id"]) || !isset($data["cantidad"])) {
    echo json_encode(["success" => false]);
    exit;
}

$inventario = json_decode(file_get_contents("inventario.json"), true);

foreach ($inventario as &$helado) {
    if ($helado["id"] == $data["id"]) {
        $helado["cantidad"] = $data["cantidad"];
        break;
    }
}

file_put_contents("inventario.json", json_encode($inventario, JSON_PRETTY_PRINT));

echo json_encode(["success" => true]);
?>
