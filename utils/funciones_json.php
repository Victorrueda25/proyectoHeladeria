<?php

function leerJSON($ruta) {
    if (!file_exists($ruta)) return [];
    return json_decode(file_get_contents($ruta), true);
}

function escribirJSON($ruta, $data) {
    file_put_contents($ruta, json_encode($data, JSON_PRETTY_PRINT));
}