<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foro</title>
</head>
<body>
    <?php
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "1234", "foro");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el hilo específico de la base de datos
    $id_db = $_GET['id'];
    $result = $conn->query("SELECT * FROM threads WHERE id=$id_db");
    $row = $result->fetch_assoc();

    // Mostrar el hilo
    echo "<h1>".$row['title']."</h1>";
    echo "<p>".$row['content']."</p>";

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>
