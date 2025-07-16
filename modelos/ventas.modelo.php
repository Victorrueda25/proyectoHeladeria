<?php

class ModeloVentas
{
    // Obtener productos disponibles
    public static function obtenerProductos()
    {
        $conexion = Conexion::conectar();

        $sql = "SELECT id_productos, nombre_productos, precio_productos, imagen_productos 
                FROM productos 
                ORDER BY nombre_productos";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las ventas registradas
    public static function obtenerVentas()
    {
        $conexion = Conexion::conectar();

        $sql = "SELECT 
                    v.id_ventas,
                    v.cantidad_ventas,
                    v.precio_unitario_ventas,
                    v.total_ventas,
                    v.fecha_ventas,
                    p.nombre_productos,
                    p.imagen_productos
                FROM ventas v
                INNER JOIN productos p ON v.producto_id_ventas = p.id_productos
                ORDER BY v.fecha_ventas DESC";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Registrar una nueva venta
    public static function registrarVenta($producto_id, $usuario_id, $cantidad, $precio_unitario)
    {
        $conexion = Conexion::conectar();

        $total = $cantidad * $precio_unitario;

        $sql = "INSERT INTO ventas 
                (producto_id_ventas, usuario_id_ventas, cantidad_ventas, precio_unitario_ventas, total_ventas, fecha_ventas)
                VALUES 
                (:producto_id, :usuario_id, :cantidad, :precio_unitario, :total, NOW())";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(":producto_id", $producto_id, PDO::PARAM_INT);
        $stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":precio_unitario", $precio_unitario);
        $stmt->bindParam(":total", $total);

        return $stmt->execute();
    }
}
