<?php
require_once "usuariomodelo.php";

$modelo = new Usuariomodelo();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'] ?? null;
    $email = $_POST['email'] ?? null;
    $telefono = $_POST['telefono'] ?? null;

    if (!$nombre || !$email || !$telefono) {
        echo "Error: Todos los campos son obligatorios";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, ingresa un correo válido";
    } else {
        if ($modelo->VerificarSiemailexixte($email)) {
        } else {
            if ($modelo->agregarUsuario($nombre, $email, $telefono)) {
                echo "Usuario agregado con éxito";
                header('location:mostrar usuarios.php');
            } else {
                echo "Error al agregar el usuario";
            }
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
    <title>Agregar Usuario</title>
</head>
<body>
    <h1>Agregar Usuario</h1>
    <form action="agregar.php" method="POST">
        <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
        <input type="email" name="email" placeholder="Ingrese su correo" required>
        <input type="number" class="te" name="telefono" placeholder="Ingrese su número de teléfono" required>
        <input class="enviar" type="submit" value="Agregar">
        <input class="re" type="reset">
    </form>
</body>
</html>
