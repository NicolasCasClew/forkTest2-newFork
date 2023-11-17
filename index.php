<!DOCTYPE html>
<?php
session_start();

require("session_check.php");

echo "<h3> Usuario = '$_SESSION[correo]'</h3>";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
</head>

<body>
    <h1>Opciones</h1>
    <a href="./crear_producto/crear_producto.php">Crear producto</a>
    </br>
    </br>
    <a href="./views/listProducts.php">Consultar el listado de productos</a>
    </br>
    </br>
    <a href="./views/deleteProduct.php">Eliminar producto</a>
    </br>
    <a href="salir.php.php">Cerrar sesion</a>
</body>

</html>