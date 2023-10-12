<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Noticia</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: index.php");
        exit;
    }
    ?>

    <h2>Añadir Noticia</h2>
    <form action="procesar_noticia.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="contenido">Contenido:</label>
        <textarea id="contenido" name="contenido" required></textarea><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="curso">Curso:</label>
        <!-- <input type="text" id="curso" name="curso" required><br> -->
        <select id="curso" name="curso" required>
                    <option value="1ESO">1r_ESO</option>
                    <option value="2ESO">2n_ESO</option>
                    <option value="3ESO">3r_ESO</option>
                    <option value="4ESO">4t_ESO</option>
                    <option value="CicloMedio">Cicle_Mitjà</option>
                    <option value="CicloSuperior">Cicle_Superior</option>
                    <option value="Bachillerato">Batchillerat</option>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required><br>

        <button type="submit">Guardar Noticia</button>
    </form>
</body>
</html>
