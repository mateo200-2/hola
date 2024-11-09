<?php
$conn = new mysqli("localhost", "root", "", "mateo");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "¡Conexión con éxito!";
}
?>
