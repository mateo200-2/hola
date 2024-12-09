<?php
require_once "productosuser.php";

$modelo = new Usuariomodelo();
$idProducto = $_GET['id'] ?? null;

if ($idProducto) {
    $producto = $modelo->obtenerusuarioporId($idProducto);
    echo "<link rel=stylesheet href=a.css >";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cantidad = $_POST['cantidad'] ?? 1;
        $metodoPago = $_POST['metodo_pago'] ?? 'Efectivo';

        $total = $producto['precio'] * $cantidad;
        
        echo "<div class='factura'>";
        echo "<h1>Factura de Compra</h1>";
        echo "<p><strong>Producto:</strong> " . htmlspecialchars($producto['nombre']) . "</p>";
        echo "<p><strong>Cantidad:</strong> " . htmlspecialchars($cantidad) . "</p>";
        echo "<p><strong>Precio Unitario:</strong> $" . htmlspecialchars($producto['precio']) . "</p>";
        echo "<p><strong>Total:</strong> $" . htmlspecialchars($total) . "</p>";
        echo "<p><strong>Método de Pago:</strong> " . htmlspecialchars($metodoPago) . "</p>";
        echo "<button><a href='menu.php?id=" . htmlspecialchars($producto['id']) . "'>INICIO</a></button>";
        echo "</div>";

        $modelo->eliminar($idProducto);

        exit;
    }
} else {
    echo "Error: Producto no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="esti.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Producto</title>
</head>
<body>
    <h1>Comprar Producto</h1>
    <?php if ($producto): ?>
        <p><strong>Producto:</strong> <?= htmlspecialchars($producto['nombre']) ?></p>
        <p><strong>Precio Unitario:</strong> $<?= htmlspecialchars($producto['precio']) ?></p>
        <form action="comprar.php?id=<?= htmlspecialchars($idProducto) ?>" method="POST">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" value="1" min="1" required>
            
            <label for="metodo_pago">Método de Pago:</label>
            <select name="metodo_pago" id="metodo_pago" required>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Nequi">Nequi</option>
                <option value="Efectivo">Efectivo</option>
            </select>
            
            <input type="submit" value="Confirmar Compra">
        </form>
    <?php else: ?>
        <p>Error: Producto no encontrado.</p>
    <?php endif; ?>
</body>
</html>
