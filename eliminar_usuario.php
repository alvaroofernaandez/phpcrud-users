<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?mensaje=Usuario eliminado exitosamente.&tipo=alert-success");
    } else {
        header("Location: index.php?mensaje=Error al eliminar usuario.&tipo=alert-error");
    }

    $stmt->close();
}

$conn->close();

exit();
?>
