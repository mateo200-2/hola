<?php
require_once "productosuser.php";

$modelo = new Usuariomodelo();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;
    $precio = $_POST['precio'] ?? null;
    $cantidad = $_POST['cantidad'] ?? null;
    $categoria = $_POST['categoria'] ?? null;

    if (!$nombre || !$descripcion || !$precio || !$cantidad || !$categoria) {
        echo "Error: Todos los campos son obligatorios";
    } elseif (!is_numeric($precio) || $precio <= 0) {
        echo "Error: El precio debe ser un número mayor a 0";
    } elseif (!is_numeric($cantidad) || $cantidad < 0) {
        echo "Error: La cantidad debe ser un número no negativo";
    } else {
        if ($modelo->agregarProducto($nombre, $descripcion, $precio, $cantidad, $categoria)) {
            echo "Producto agregado con éxito";
            header('Location:mostrar productos.php');
            exit;
        } else {
            echo "Error al agregar el producto";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="iniciar sesion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Producto</h1>
    <form action="" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <input type="text" placeholder="descripcion" name="descripcion">
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <input type="text" name="categoria" placeholder="Categoría" required>
        <input type="submit" value="Agregar">
        <input type="reset" value="Limpiar">
    </form>
</body>
</html>
