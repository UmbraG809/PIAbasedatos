<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'crear') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];

        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo) VALUES (?, ?)");
        $stmt->execute([$nombre, $correo]);

        header("Location: index.php");
    } elseif ($accion === 'eliminar') {
        $id = $_POST['id'];

        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: index.php");
    } elseif ($accion === 'editar') {
        $id = $_POST['id'];
        $nuevo_nombre = "Editado";
        $nuevo_correo = "editado@example.com";

        $stmt = $pdo->prepare("UPDATE usuarios SET nombre = ?, correo = ? WHERE id = ?");
        $stmt->execute([$nuevo_nombre, $nuevo_correo, $id]);

        header("Location: index.php");
    }
}
?>
