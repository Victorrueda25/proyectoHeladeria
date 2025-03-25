<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Helados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 class="titulo">Registrar Venta</h1>
    <div class="contenedor">
        <!-- Sección de productos -->
        <div class="helados-container">
            <?php
            $helados = [
                ["nombre" => "Café", "precio" => 2.5, "imagen" => "heladoCafe.jpeg"],
                ["nombre" => "Chispas Dulces", "precio" => 3.0, "imagen" => "heladoChispasDulces.jpeg"],
                ["nombre" => "Coco", "precio" => 2.75, "imagen" => "heladoCoco.jpeg"],
                ["nombre" => "Galleta", "precio" => 3.2, "imagen" => "heladoGalleta.jpeg"]
            ];
            foreach ($helados as $helado) {
                echo "<div class='helado'>
                        <img src='bdImagenes/{$helado['imagen']}' alt='Helado {$helado['nombre']}'>
                        <h3>{$helado['nombre']} - $ {$helado['precio']}</h3>
                        <input type='number' min='1' value='1' class='cantidad'>
                        <button class='agregar'>Agregar</button>
                      </div>";
            }
            ?>
        </div>

        <!-- Sección del carrito -->
        <div class="carrito-container">
            <h2>Registro de Venta</h2>
            <table class="tabla-carrito">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="lista-carrito"></tbody>
            </table>
            <h3 id="total-general">Total General: $0.00</h3>
            <button class="generar-venta">Generar Venta</button>
        </div>
    </div>

    <script src="ventas.js"></script>
</body>
</html>
