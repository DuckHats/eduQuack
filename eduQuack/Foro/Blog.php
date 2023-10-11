<?php
session_start();
require_once('blog_database.php');

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $autor = $_SESSION["username"];

    if ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        $imagen_path = "uploads/images/" . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen_path);
    } else {
        $imagen_path = "";
    }

    $sql = "INSERT INTO posts (title, content, image_path, author) VALUES ('$titulo', '$contenido', '$imagen_path', '$autor')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Blog.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$noticiasPorPagina = 5;
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $noticiasPorPagina;
$cursoFiltro = isset($_GET['curso']) ? $_GET['curso'] : 'todos';

if ($cursoFiltro !== 'todos') {
    $sql = "SELECT * FROM posts WHERE curso = '$cursoFiltro' ORDER BY created_at DESC LIMIT $noticiasPorPagina OFFSET $offset";
} else {
    $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $noticiasPorPagina OFFSET $offset";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | eduQuack</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <menu>
        <img src="../images/ginebro-logo (1).png">
        <ul>
            <li><a href="../index.php"><h3>Menú</h3></a></li>
            <li><a href="../teams.php"><h3>Grupos</h3></a></li>
            <li><a href="../news.php"><h3>Noticias</h3></a></li>
            <li><a href="./Blog.php"><h3  class="negrita">Forum</h3></a></li>
            <li><a href="../perfil.php"><img id="conficon" src="../images/user.png"></a></li>
        </ul>  
    </menu>
    
    <main>
        <div class="container">
            <h1>eduQuack Blog</h1>

            <h2>New Post</h2>
            <form action="Blog.php" method="post" enctype="multipart/form-data">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required><br>
                <label for="contenido">Contenido:</label><br>
                <textarea id="contenido" name="contenido" rows="4" cols="50" required></textarea><br>
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen"><br>
                <input type="submit" value="Publicar">
            </form>

            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="post">
                    <a href="borrar_post.php?id=<?= $row["id"] ?>">Eliminar</a>
                    <a href="thread.php?id=<?= $row["id"] ?>">Ver Más</a>
                    <h2><?= $row["title"] ?></h2>
                    <p>Autor: <?= $row["author"] ?></p>
                    <p><?= $row["content"] ?></p>
                    <?php if ($row["image_path"]) : ?>
                        <img src="<?= $row["image_path"] ?>" alt="Imagen del post">
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

    <div class="pagination">
        <?php
        $totalPaginas = ceil($totalNoticias / $noticiasPorPagina);
        for ($i = 1; $i <= $totalPaginas; $i++) {
            $active = $i == $paginaActual ? 'active' : '';
            echo "<a class='$active' href='Blog.php?pagina=$i&curso=$cursoFiltro'>$i</a>";
        }
        ?>
    </div>

    <div class="curso-filtro">
        <label for="curso">Filtrar por curso:</label>
        <select id="curso" name="curso">
            <option value="todos">Todos</option>
            <option value="curso1">Curso 1</option>
            <option value="curso2">Curso 2</option>
            <option value="curso3">Curso 3</option>
            <!-- Agrega más opciones de cursos según sea necesario -->
        </select>
        <input type="submit" value="Filtrar">
    </form>
    </div>
    </main>

    <footer>
        <a href="../eduQuack/Legal/License.pdf">Todos los derechos reservados a eduQuack</a>
        <p>Contáctenos en el correo <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>
</body>

</html>

