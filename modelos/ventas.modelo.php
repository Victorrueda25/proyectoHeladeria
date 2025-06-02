<?php



function obtenerVentas() {
    $conexion = Conexion::conectar();

    $stmt = $conexion->prepare("
        SELECT v.id, p.nombre AS producto, v.cantidad, v.precio_unitario, v.total, v.fecha
        FROM ventas v
        JOIN productos p ON v.producto_id = p.id
        ORDER BY v.fecha DESC
    ");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function registrarVenta($producto_id, $cantidad, $precioUnitario) {
    $conexion = Conexion::conectar();
    $total = $cantidad * $precioUnitario;

    $stmt = $conexion->prepare("
        INSERT INTO ventas (producto_id, cantidad, precio_unitario, total)
        VALUES (:producto_id, :cantidad, :precio_unitario, :total)
    ");

    $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
    $stmt->bindParam(':precio_unitario', $precioUnitario);
    $stmt->bindParam(':total', $total);

    $stmt->execute();
}
