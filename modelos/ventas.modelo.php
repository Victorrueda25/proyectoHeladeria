<?php

class ModeloVentas
{
    // En ModeloProductos
    public static function mdlObtenerProductos()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 1. Registrar venta principal
    public static function mdlCrearVenta($usuarioId, $total)
    {
        $conexion = Conexion::conectar(); // 💡 Reutiliza la misma conexión
        $stmt = $conexion->prepare("INSERT INTO ventas (usuario_id_ventas, total_ventas, fecha_ventas) VALUES (?, ?, NOW())");

        if ($stmt->execute([$usuarioId, $total])) {
            return $conexion->lastInsertId(); // ⚠️ Esto sí devuelve el ID correcto
        } else {
            return null;
        }
    }

    // 2. Registrar detalle de venta
    public static function mdlRegistrarDetalleVenta($ventaId, $producto)
    {
        $totalProducto = $producto["cantidad"] * $producto["precio"];

        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO detalle_ventas (venta_id, producto_id, cantidad, precio_unitario, total_producto)
         VALUES (?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $ventaId,
            $producto["id"],
            $producto["cantidad"],
            $producto["precio"],
            $totalProducto
        ]);
    }

}

