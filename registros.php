<?php

$conn = new mysqli("localhost", "root", "", "mateo");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["contraseña"];
    $telefono = $_POST["telefono"];

    
    $stmt = $conn->prepare("INSERT INTO cliente (nombre, email,contraseña,telefono) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $email, $password, $telefono);

    if ($stmt->execute()) {
        header("Location: peliculas.html");
    } else {
        
        echo "Error al insertar datos: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


</body>
</html>