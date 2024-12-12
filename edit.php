<?php

require_once "usuariomodelo.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuariomodelo = new Usuariomodelo();
    $usuario = $usuariomodelo->obtenerusuarioporId($id); 
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nuevoNombre = $_POST['nombre'];
        $nuevoEmail = $_POST['email'];
        $nuevoTelefono = $_POST['telefono'];
        
        if ($usuariomodelo->actualizar($id, $nuevoNombre, $nuevoEmail, $nuevoTelefono)) {
            echo "Usuario actualizado";
            header("location:mostrar usuarios.php");
        } else {
            echo "Error al actualizar usuario";
        }
    }
} else {
    echo "ID de usuario no especificado";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="esti.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <?php if (isset($usuario)): ?>
        <div>
        <form method="POST" action="">
            <h1>Editar Usuario</h1>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
            
            <button type="submit">Actualizar</button>
        </form>
    </div>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>
</body>
</html>
