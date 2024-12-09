<?php

require_once "productosuser.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuariomodelo = new Usuariomodelo();
    if ($usuariomodelo->eliminar($id)) {
        echo "Usuario eliminado";
        header("location:mostrar productos.php");
    } else {
        echo "Error al eliminar usuario";
    }
} else {
    echo "ID de usuario no especificado";
}

?>
