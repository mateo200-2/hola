<?php

class Conexion {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "produc";
    public $conn;

    public function getConexion() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
?>
