<?php

require_once "cone.php";

class Usuariomodelo {

    public $conn;

    public function __construct() {
        $database = new Conexion();
        $this->conn = $database->getConexion();   
    }

    public function lista() {
        $query = "SELECT id, nombre, email, telefono FROM usuarios";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    public function agregarUsuario($nombre, $email, $telefono) {
        $query = "INSERT INTO usuarios (nombre, email, telefono) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nombre, $email, $telefono);
        return $stmt->execute();
    }

    public function VerificarSiemailexixte($email) {
        $query = "SELECT id FROM usuarios WHERE email=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
    public function obtenerusuarioporId($id) {
        $query = "SELECT id, nombre, email, telefono FROM usuarios WHERE id = ?";
        $stmt = $this->conn->prepare($query); 
        $stmt->bind_param("i", $id);  
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function eliminar($id) {
         $query = "DELETE FROM usuarios WHERE id = ?";
         $stmt = $this->conn->prepare($query);
          $stmt->bind_param("i", $id); 
          return $stmt->execute(); 

        }
        public function editar($nombre, $email, $telefono) {
            $query = " UPDATE FROM  usuarios nombre =?, email =? , telefono =? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sss", $nombre, $email, $telefono);
            return $stmt->execute();
        }
        public function actualizar($id, $nombre, $email, $telefono) {
            $query = "UPDATE usuarios SET nombre = ?, email = ?, telefono = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssi", $nombre, $email, $telefono, $id);  
            return $stmt->execute();
        }
        public function produtos() {
            $query = "SELECT id, nombre, descripcion, precio,cantidad,categoria FROM productos";
            $result = $this->conn->query($query);
            return $result->fetch_all(MYSQLI_ASSOC); 
        }
        public function obtenerUsuarios() {
            $query = "SELECT id, nombre, email, telefono FROM usuarios";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        
}
?>
