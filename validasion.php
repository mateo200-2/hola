<?php

$conn = new mysqli("localhost", "root", "", "produc");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST["gmail"]) && isset($_POST["contraseña"])) {
    $email = $_POST["gmail"];
    $password = $_POST["contraseña"];

   
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND contraseña = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        header("Location: peliculas.html");
        exit();
    } else {
        echo "<p style='color: red;'>Correo o contraseña incorrectos. Inténtalo de nuevo.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
