<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $correo = $_POST['Correo'];
    $contrasena = $_POST['Contraseña'];

    // Hash de la contraseña (mejora la seguridad)
    $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    $validar = mysqli_query($conexion, " SELECT * FROM registro WHERE Correo_electronico = '$correo' and Contraseña = '$contrasena'");
    
    if(mysqli_num_rows($validar) > 0){

        $_SESSION['Correo'] = $correo;
        header("location: index1.html");
        exit;
    }
    
}

$conexion->close();
?>