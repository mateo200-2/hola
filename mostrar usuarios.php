<?php

require_once "usuariomodelo.php";

$usuariomodelo = new Usuariomodelo();
$usuarios = $usuariomodelo->obtenerUsuarios();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="us.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuarios</title>
</head>
<body>
    <nav class="main-menu">
        <a href="menu.php" class="btn btn-primary">INICIO</a>
        <a href="agregar.php" class="btn btn-primary">AGREGAR</a>
    </nav>
    <div class="container">
        <h1 class="section-title">Usuarios</h1>
        <div class="horizontal-scroll">
            <?php foreach ($usuarios as $usuario): ?>
                <div class="user-card"> 
                    <h5><?php echo htmlspecialchars($usuario['nombre']); ?></h5>
                    <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
                    <p>Teléfono: <?php echo htmlspecialchars($usuario['telefono']); ?></p>
                    <div class="card-actions">
                        <button class="btn btn-delete"> <a href='eliminar.php?id=<?php echo $usuario["id"]; ?>' class='btn-link'>Eliminar</a></button>
                        <button class="btn btn-edit"> <a href='edit.php?id=<?php echo $usuario["id"]; ?>' class='btn-link'>Editar</a></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <form id="for1" action="buscarpro.php" method="POST">
        <input type="text" name="buscar" placeholder="BUSCAR USUARIO">
        <button type="submit" class="btn btn-primary">BUSCAR</button>
    </form>
</body>
</html>
