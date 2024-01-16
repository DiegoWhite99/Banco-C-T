<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $servicio = $_POST['servicio'];

    // Evitar inyección SQL usando sentencias preparadas
    $stmt = $conexion->prepare("INSERT INTO cliente (Nombre, Apellido, Documento, Servicio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $documento, $servicio);

    if ($stmt->execute()) {
        echo '
            <script>
            alert("Cliente agregado exitosamente");
            window.location = "index_gracias.html";
            </script>';
        exit();
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'Error: Método de solicitud no permitido';
}

$conexion->close();
?>
