<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];
    $contrasena = $_POST['Contraseña'];

    // Evitar inyección SQL usando sentencias preparadas
    $stmt = $conexion->prepare("SELECT * FROM administrador WHERE id_empleado = ? AND contrasena = ?");
    $stmt->bind_param("ss", $ID, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Credenciales válidas, inicia la sesión y redirige
        $_SESSION['ID'] = $ID;
        echo "<script>window.location.href='index1.html';</script>";
        exit;
    } else {
        echo "Credenciales inválidas";
    }

    $stmt->close();
}

$conexion->close();
?>