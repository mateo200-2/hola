<?php



require_once "cone.php";
$db = new Conexion();
$conn = $db->getConexion();
echo "<link rel=stylesheet href=esti.css >";
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
            echo "<h2>Resultado de búsqueda</h2>";
            echo "<table border=1>";
            echo "<thead><tr><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th></tr></thead>";
            echo "<tbody>";

            while ($fila = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
                echo "<td><a href='eliminarpro.php?id=" . $fila['id'] . "' class='btn btn-delete'>Eliminar</a> 
                        <a href='editar.php?id=" . $fila['id'] . "' class='btn btn-edit'>Editar</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No se encontraron resultados.";
        }

        $stmt->close();
    } else {
        echo "Por favor, ingrese un término de búsqueda.";
    }
} catch (Throwable $th) {
    echo "Error en la consulta: " . $th->getMessage();
}

$conn->close();
?>
