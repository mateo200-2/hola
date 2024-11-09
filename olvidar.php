<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "mateo");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contrasena_actual = $_POST["contrasena_actual"];
    $nueva_contrasena = $_POST["nueva_contrasena"];

    // Consulta preparada para verificar la contraseña actual
    $stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ? AND contraseña = ?");
    $stmt->bind_param("ss", $email, $contrasena_actual);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado, proceder a cambiar la contraseña
        $stmt = $conn->prepare("UPDATE cliente SET contraseña = ? WHERE email = ?");
        $stmt->bind_param("ss", $nueva_contrasena, $email);

        if ($stmt->execute()) {
            echo "Contraseña actualizada correctamente";
        } else {
            echo "Error al actualizar la contraseña: " . $stmt->error . "";
        }
    } else {
        echo "Correo o contraseña actual incorrectos";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sesion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button><a href="iniciar.html">volver al inicio</a></button>
</body>
</html>