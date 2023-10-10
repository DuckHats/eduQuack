<!-- Intent de foro -->
<h1>Foro</h1>
    <ul>
        <?php
        // Conexión a la base de datos
        $conn = new mysqli("localhost", "root", "1234", "foro");

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener hilos de la base de datos
        $result = $conn->query("SELECT * FROM threads ORDER BY created_at DESC");

        // Mostrar hilos
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='thread.php?id=".$row['id']."'>".$row['title']."</a></li>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </ul>
    <h2>Nuevo Hilo</h2>
    <form action="create_thread.php" method="post">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="content">Contenido:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Publicar">
    </form>
    <!-- Final de l'intent de foro
    Sha de borra tambe thread.php i create_thread.php -->