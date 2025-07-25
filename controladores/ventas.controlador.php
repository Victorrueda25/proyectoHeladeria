<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class ControladorVentas{

    public static function ctrObtenerProductos()
{
    require_once "modelos/ventas.modelo.php";
    return ModeloVentas::mdlObtenerProductos(); 

}



    // Registrar una nueva venta
    public static function ctrRegistrarVenta()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["productos"])) {
            $productos = json_decode($_POST["productos"], true); // ← Asegúrate de decodificar

            $usuarioId = $_SESSION["id_usuario"];
            $totalVenta = 0;

            foreach ($productos as $p) {
                $totalVenta += $p["cantidad"] * $p["precio"];
            }

            $idVenta = ModeloVentas::mdlCrearVenta($usuarioId, $totalVenta);

            foreach ($productos as $p) {
                ModeloVentas::mdlRegistrarDetalleVenta($idVenta, $p);
                
                ModeloInventario::mdlDescontarStock($p["id"], $p["cantidad"]);
            }

            echo "<script>alert('Venta registrada correctamente'); window.location='index.php?paginas=ventas';</script>";
        }
    }


    public static function mdlDescontarStock($productoId, $cantidad)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock_productos = stock_productos - ? WHERE id_productos = ?");
        return $stmt->execute([$cantidad, $productoId]);
    }


}

