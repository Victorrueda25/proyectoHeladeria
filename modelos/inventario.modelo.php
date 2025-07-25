<?php


class ModeloInventario {

    // Obtener todos los productos
    public static function mdlMostrarInventario() {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar stock
    public static function mdlActualizarStock($id, $nuevoStock) {
        $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock_productos = :stock WHERE id_productos = :id");
        $stmt->bindParam(":stock", $nuevoStock, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function mdlDescontarStock($idProducto, $cantidad) {
    $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock_productos = stock_productos - ? WHERE id_productos = ?");
    $stmt->execute([$cantidad, $idProducto]);
}

}
