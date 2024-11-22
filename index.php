<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Gestión de Registros</h1>
    
    <!-- Formulario para agregar registros -->
    <form action="acciones.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="correo" placeholder="Correo" required>
        <button type="submit" name="accion" value="crear">Agregar</button>
    </form>

    <!-- Tabla para mostrar registros -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM usuarios");
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['correo']}</td>
                    <td>
                        <form action='acciones.php' method='post' style='display:inline;'>
                            <input type='hidden' name='id' value='{$fila['id']}'>
                            <button type='submit' name='accion' value='editar'>Editar</button>
                            <button type='submit' name='accion' value='eliminar'>Eliminar</button>
                        </form>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
