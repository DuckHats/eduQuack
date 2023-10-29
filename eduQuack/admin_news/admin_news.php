<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Afegir notícies</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: news_admin_login.html");
        exit;
    }
    ?>

    <h2>Afegir notícies</h2>
    <form action="noticia.php" method="post">
        <label for="titulo">Títol:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="contenido">Contingut:</label>
        <textarea id="contenido" name="contenido" required></textarea><br>

        <label for="fecha">Data:</label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="curso">Curs:</label>
        <select id="curso" name="curso" required>
            <option value="1ESO">1r_ESO</option>
            <option value="2ESO">2n_ESO</option>
            <option value="3ESO">3r_ESO</option>
            <option value="4ESO">4t_ESO</option>
            <option value="CicloMedio">Cicle_Mitjà</option>
            <option value="CicloSuperior">Cicle_Superior</option>
            <option value="Bachillerato">Batchillerat</option>
        </select><br>

        <!-- <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br> -->
        <input type="submit" value="Guardar Noticia">
    </form>
</body>
<footer>
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens per correu a: <a href="mailto:duck4hats@gmail.com">duck4hats@gmail.com</a></p>
    </footer>
</html>
