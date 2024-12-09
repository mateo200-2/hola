<?php

print_r($_POST);

require_once "usuariomodelo.php";

$usuario = new Usuariomodelo();
$productos = $usuario->produtos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="esti.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
</head>
<body>
    <h1>Mostrar Productos</h1>
    <a href="agregarpro.php"><button>Agregar</button></a>
    <div class="cards-container">
        <?php foreach ($productos as $producto): ?>
            <div class="card">
                <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                <p><strong>ID:</strong> <?php echo htmlspecialchars($producto['id']); ?></p>
                <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto['descripcion']); ?></p>
                <p><strong>Precio:</strong> $<?php echo htmlspecialchars($producto['precio']); ?></p>
                <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($producto['cantidad']); ?></p>
                <p><strong>Categoría:</strong> <?php echo htmlspecialchars($producto['categoria']); ?></p>
                <div class="card-actions">
                    <a href='eliminarpro.php?id=<?php echo $producto["id"]; ?>' class='btn btn-delete'>Eliminar</a>
                    <a href='editar.php?id=<?php echo $producto["id"]; ?>' class='btn btn-edit'>Editar</a>
                    <a href='comprar.php?id=<?php echo $producto["id"]; ?>' class='btn btn-buy'>Comprar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
