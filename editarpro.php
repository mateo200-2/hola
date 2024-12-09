<?php

require_once "productosuser.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuariomodelo = new Usuariomodelo();
    $usuario = $usuariomodelo->obtenerusuarioporId($id); 
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nuevoNombre = $_POST['nombre'];
        $nuevodes = $_POST['descripcion'];
        $nuevopre = $_POST['preccio'];
        $nuevacanti= $_POST['cantidad'];
        $nuevacate = $_POST['categoria'];
        
        
        if ($usuariomodelo->actualizar($id, $nuevoNombre, $nuevodes, $nuevopre,$nuevacanti,$nuevacate)) {
            echo "producto actualizado";
            header("location: mostrar productos.php");
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
            <label for="">Nombre</label>
            <input type="text" id="nombre" name="nombre" value=" <?php echo htmlspecialchars ($usuario['nombre']); ?>">
            
            <label for="">descripcion</label>
            <input type="text" id="email" name="descripcion" value=" <?php echo htmlspecialchars ($usuario['descripcion']); ?>" >
            
            <label for="">preccio</label>
            <input type="number" id="preccio" name="preccio" value=" <?php echo htmlspecialchars ($usuario['preccio']); ?>" >
            
            <label for="">cantidad</label>
            <input type="number" id="preccio" name="cantidad" value=" <?php echo htmlspecialchars ($usuario['cantidad']); ?>" >

            <label for="">categoria</label>
            <input type="text" id="preccio" name="categoria" value=" <?php echo htmlspecialchars ($usuario['categoria']); ?>" >
            
            
            <button type="submit">Actualizar</button>
            </div>
        </form>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>
</body>
</html>
