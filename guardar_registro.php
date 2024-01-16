<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $cedula = $_POST['Cedula'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $celular = $_POST['Celular'];
    $correo = $_POST['Correo'];
    $contrasena = $_POST['Contraseña'];

    // Hash de la contraseña (mejora la seguridad)
    $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO registro (Nombre, Apellido, Cedula, fecha_nacimiento, Celular, Correo_electronico, Contraseña) 
            VALUES ('$nombre', '$apellido', '$cedula', '$fecha_nacimiento', '$celular', '$correo', '$hash_contrasena')";

    if ($conexion->query($sql) === TRUE) {
        echo '
            <script>
            alert("usuario creado exitosamanete");
            window.location = "index_login.html";
        </script>

        ';
        exit();

    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
} else {
    echo "Error: Método de solicitud no permitido";
}

$conexion->close();
?>
