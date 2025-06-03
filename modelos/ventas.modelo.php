<?php



class ModeloVentas {

    // Método para obtener todas las ventas
    public static function obtenerVentas() {
        $conexion = Conexion::conectar();

        $sql = "
            SELECT v.id, p.nombre AS producto, v.cantidad, v.precio_unitario, v.total, v.fecha
            FROM ventas v
            JOIN productos p ON v.producto_id = p.id
            ORDER BY v.fecha DESC
        ";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para registrar una nueva venta
    public static function registrarVenta($producto_id, $cantidad, $precioUnitario) {
        $conexion = Conexion::conectar();

        $total = $cantidad * $precioUnitario;

        $sql = "
            INSERT INTO ventas (producto_id, cantidad, precio_unitario, total, fecha)
            VALUES (:producto_id, :cantidad, :precio_unitario, :total, NOW())
        ";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':precio_unitario', $precioUnitario);
        $stmt->bindParam(':total', $total);

        $stmt->execute();
    }

    // (Opcional) Método para obtener productos disponibles para ventas
    public static function obtenerProductos() {
        $conexion = Conexion::conectar();

        $sql = "SELECT id, nombre, precio FROM productos ORDER BY nombre";

        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
