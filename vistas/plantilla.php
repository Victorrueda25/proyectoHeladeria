
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Heladería - Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="vistas/css/styles.css">
</head>
<body>

    <?php include "html/menu.html"; ?>
    


    <div class="container-fluid">
        <div class="container py-5">

            <?php 
                // Validar si existe el parámetro "modulo" en la URL
                if (isset($_GET["paginas"])) {

                    // Listado de módulos válidos
                    if (
                        $_GET["paginas"] == "login" ||
                        $_GET["paginas"] == "menu" ||
                        $_GET["paginas"] == "ventas" ||
                        $_GET["paginas"] == "inventario" ||
                        $_GET["paginas"] == "reportes" ||
                        $_GET["paginas"] == "salir"
                    ) {
                        include "paginas/" . $_GET["paginas"] . ".php";
                    } else {
                        include "paginas/error404.php";
                    }

                } else {
                    // Cargar por defecto el módulo de ingreso
                    include "paginas/login.php";
                }
            ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
        
    </div>
    </div>

</body>
</html>
