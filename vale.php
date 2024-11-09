<?php
$con = mysqli_connect("localhost", "root","", "mateo");
if($con->connect_error){
    die("error al conectarte a la base de datos".$con->connect_error);
} else{
    echo"conecxion exitosa";
    echo"<br>";
}

if(isset($_POST["gmail"]) && isset($_POST["contraseña"])){
    $email=$_POST["gmail"];
    $contraseña=$_POST["contraseña"];
    $stmt = $con->prepare("SELECT * FROM cliente  WHERE email =? AND contraseña=?");
    $stmt->bind_param("ss",$email,$contraseña);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        echo"bienvenido as iniciado secion";
        
    } else{
        echo"contraseña o correo incorrectos";
       
    }
    $stmt->close();
}
$con->close();
?>