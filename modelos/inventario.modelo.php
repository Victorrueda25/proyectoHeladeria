<?php


class ModeloInventario
{

    // Obtener todos los productos
    public static function mdlMostrarInventario()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar stock
    public static function mdlActualizarStock($id, $nuevoStock)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock_productos = :stock WHERE id_productos = :id");
        $stmt->bindParam(":stock", $nuevoStock, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function mdlDescontarStock($idProducto, $cantidad)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock_productos = stock_productos - ? WHERE id_productos = ?");
        $stmt->execute([$cantidad, $idProducto]);
    }

    public static function mdlAgregarProducto($nombre, $precio, $stock, $rutaImagen)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO productos(nombre_productos, precio_productos, stock_productos, imagen_productos) VALUES (:nombre, :precio, :stock, :imagen)");

            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $precio);
            $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
            $stmt->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok"; // ← esto es lo que espera tu JS
            } else {
                // debug: error de PDO
                $errorInfo = $stmt->errorInfo();
                return "Error SQL: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            return "Excepción: " . $e->getMessage();
        }
    }



    public static function mdlExisteProducto($nombre)
    {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM productos WHERE nombre_productos = :nombre");
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }


}
