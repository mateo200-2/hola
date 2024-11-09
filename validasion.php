<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "mateo");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST["gmail"]) && isset($_POST["contraseña"])) {
    $email = $_POST["gmail"];
    $password = $_POST["contraseña"];

    // Consulta preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT * FROM cliente WHERE email = ? AND contraseña = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p style='color: green;'>Inicio de sesión exitoso. ¡Bienvenido!</p>";
        // Aquí puedes redirigir al usuario a otra página, por ejemplo, a la página de bienvenida.
    } else {
        echo "<p style='color: red;'>Correo o contraseña incorrectos. Inténtalo de nuevo.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
