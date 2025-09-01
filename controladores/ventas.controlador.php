<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class ControladorVentas
{

    public static function ctrObtenerProductos()
    {
        require_once "modelos/ventas.modelo.php";
        return ModeloVentas::mdlObtenerProductos();

    }



    // Registrar una nueva venta
public static function ctrRegistrarVenta()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["productos"])) {
        $productos = json_decode($_POST["productos"], true);

        if (!$productos || count($productos) === 0) {
            $_SESSION['venta_error'] = "No se recibieron productos para registrar la venta";
            header("Location: index.php?paginas=ventas");
            exit;
        }

        $usuarioId = $_SESSION['id_usuario'] ?? 1; 
        $totalVenta = 0;

        foreach ($productos as $p) {
            if (!isset($p['id'], $p['cantidad'], $p['precio'])) {
                $_SESSION['venta_error'] = "Datos incompletos en uno de los productos";
                header("Location: index.php?paginas=ventas");
                exit;
            }
            $totalVenta += $p['cantidad'] * $p['precio'];
        }

        $idVenta = ModeloVentas::mdlCrearVenta($usuarioId, $totalVenta);

        if ($idVenta) {
            $errores = [];

            foreach ($productos as $p) {
                $okDetalle = ModeloVentas::mdlRegistrarDetalleVenta($idVenta, $p);
                $okStock   = ModeloVentas::mdlDescontarStock($p['id'], $p['cantidad']);

                if (!$okDetalle || $okStock !== "ok") {
                    $errores[] = "Error con producto ID " . $p['id'];
                }
            }

            if (empty($errores)) {
                $_SESSION['venta_success'] = [
                    "msg"    => "✅ Venta registrada correctamente",
                    "idVenta"=> $idVenta,
                    "total"  => $totalVenta
                ];
            } else {
                $_SESSION['venta_warning'] = [
                    "msg"      => "⚠️ Venta registrada con errores",
                    "detalles" => $errores,
                    "idVenta"  => $idVenta,
                    "total"    => $totalVenta
                ];
            }
        } else {
            $_SESSION['venta_error'] = "No se pudo registrar la venta en la base de datos";
        }

        // 👈 Redirige de nuevo a ventas.php para mostrar el SweetAlert
        header("Location: index.php?paginas=ventas");
        exit;
    }
}




    public static function mdlDescontarStock($productoId, $cantidad)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock_productos = stock_productos - ? WHERE id_productos = ?");
        return $stmt->execute([$cantidad, $productoId]);
    }


}

