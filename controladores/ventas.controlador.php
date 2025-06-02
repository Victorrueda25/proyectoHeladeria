<?php
require_once __DIR__ . '/../config/Conexion.php'; // o el archivo que maneje la clase Conexion

class ModeloVentas {

    // Registrar una nueva venta
    public static function registrarVenta($producto_id, $cantidad, $precio_unitario) {
        $pdo = Conexion::conectar();

        $total = $cantidad * $precio_unitario;
        $fecha = date('Y-m-d H:i:s');

        $sql = "INSERT INTO ventas (producto_id, cantidad, precio_unitario, total, fecha) 
                VALUES (:producto_id, :cantidad, :precio_unitario, :total, :fecha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':precio_unitario', $precio_unitario);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->execute();
    }

    // Obtener todas las ventas con el nombre del producto
    public static function obtenerVentas() {
        $pdo = Conexion::conectar();

        $sql = "SELECT v.id, p.nombre AS producto, v.cantidad, v.precio_unitario, v.total, v.fecha
                FROM ventas v
                INNER JOIN productos p ON v.producto_id = p.id
                ORDER BY v.fecha DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener lista de productos (por si quieres usar en ventas.php)
    public static function obtenerProductos() {
        $pdo = Conexion::conectar();
        $sql = "SELECT id, nombre, precio FROM productos ORDER BY nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
