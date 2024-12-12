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

    public function agregarProducto($nombre, $descripcion, $precio, $cantidad, $categoria) {
    $query = "INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $cantidad, $categoria);
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
        $query = "SELECT  nombre,descripcion, precio,cantidad,categoria FROM productos WHERE id = ?";
        $stmt = $this->conn->prepare($query); 
        $stmt->bind_param("i", $id);  
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function eliminar($id) {
         $query = "DELETE FROM productos WHERE id = ?";
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
        public function actualizar($id, $nombre, $descripcion, $preccio, $cantidad, $categoria) {
            $query = "UPDATE productos SET nombre = ?, descripcion = ?, preccio = ? , cantidad=? , categoria=? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssisi", $nombre, $descripcion, $preccio, $cantidad, $categoria);  
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
