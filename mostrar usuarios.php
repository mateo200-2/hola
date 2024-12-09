<?php

require_once "usuariomodelo.php";

$usuariomodelo = new Usuariomodelo();
$usuarios = $usuariomodelo->obtenerUsuarios();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuarios</title>
    <link rel="stylesheet" href="contenido.css"> 
</head>
<body>
    <a href="menu.php" class="gre"><button>INICIO</button></a>
    <a href="agregar.php"><button>AGREGAR</button></a>
    <div class="container">
        <h1 class="section-title">Usuarios</h1>
        <div class="horizontal-scroll">
            <?php foreach ($usuarios as $usuario): ?>
                <div class="plan-card plan-premium"> 
                    <h5><?php echo htmlspecialchars($usuario['nombre']); ?></h5>
                    <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
                    <p>Teléfono: <?php echo htmlspecialchars($usuario['telefono']); ?></p>
                    <td>
                       <button class="hola"> <a href='eliminar.php?id=<?php echo $usuario["id"]; ?>' class='btn btn-delete'>Eliminar</a></button> <br>
                       <button class="hola"> <a href='editar.php?id=<?php echo $usuario["id"]; ?>' class='btn btn-edit'>Editar</a></button>
                    </td>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <link rel="stylesheet" href="esti.css">
    <form id="for1" action="buscarpro.php" method="POST">
    <input type="text" name="buscar" placeholder="BUSCAR PRODUCTO">
    <button type="submit">BUSCAR</button>
</body>
</html>
