<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $email);

    if ($stmt->execute()) {
        header("Location: index.php?mensaje=Usuario agregado exitosamente.&tipo=alert-success");
    } else {
        header("Location: index.php?mensaje=Error al agregar usuario.&tipo=alert-error");
    }

    $stmt->close();
}

$conn->close();
?>
