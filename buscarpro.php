<?php

require_once "cone.php";
$db = new Conexion();
$conn = $db->getConexion();
echo "<link rel='stylesheet' href='er.css'>";

try {
    $qery = isset($_POST['buscar']) ? trim($_POST['buscar']) : '';

    if ($qery) {
        
        $sql = "SELECT * FROM usuarios 
                WHERE nombre LIKE ? 
                   OR email LIKE ? 
                   OR telefono LIKE ?";

       
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }

       
        $likeQuery = "%$qery%";
        $stmt->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);

       
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2 class='search-results-title'>Resultado de búsqueda</h2>";
            echo "<div class='cards-container'>";  

            while ($fila = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<h3>" . htmlspecialchars($fila['nombre']) . "</h3>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($fila['email']) . "</p>";
                echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($fila['telefono']) . "</p>";
                echo "<div class='card-actions'>";
                echo "<a href='eliminarpro.php?id=" . $fila['id'] . "' class='btn btn-delete'>Eliminar</a> 
                        <a href='editar.php?id=" . $fila['id'] . "' class='btn btn-edit'>Editar</a>";
                echo "</div>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "<p>No se encontraron resultados.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Por favor, ingrese un término de búsqueda.</p>";
    }
} catch (Throwable $th) {
    echo "Error en la consulta: " . $th->getMessage();
}

$conn->close();
?>
