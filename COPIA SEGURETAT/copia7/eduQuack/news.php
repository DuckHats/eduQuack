<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}

require_once('news_database.php');
// $servername = "localhost";
// $username = "root";
// $password = "1234";
// $database = "noticias_db";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener todas las noticias
$sql = "SELECT titulo, contenido, fecha FROM noticias";
$result = $conn->query($sql);

// Array para almacenar las noticias
$noticias = [];

// Obtener todas las noticias y guardarlas en el array $noticias
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración de la codificación de caracteres y el tamaño de la ventana de visualización -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página y enlace al icono en la pestaña del navegador -->
    <title>News | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Menú de navegación -->
    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <!-- Enlaces a otras páginas del sitio web -->
            <li><a href="index.php"><h3>Menú</h3></a></li>
            <li><a href="http://192.168.56.105:3000/"><h3>Grups</h3></a></li>
            <li><a href="news.php"><h3 class="negrita">Notícies</h3></a></li>
            <li><a href="./Foro/Blog.php"><h3>Forum</h3></a></li>
            <li><a href="./formularis.php"><h3>Valoracións</h3></a></li>
            <li><a href="perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>
    </menu>
    <main>
        <!-- Contenedor para mostrar las noticias dinámicamente -->
        <div id="noticias-container"></div>
        <?php foreach ($noticias as $noticia): ?>
        <div class="noticia">
            <h2><?php echo htmlspecialchars($noticia['titulo']); ?></h2>
            <p><?php echo htmlspecialchars($noticia['contenido']); ?></p>
            <p>Fecha: <?php echo htmlspecialchars($noticia['fecha']); ?></p>
        </div>
    <?php endforeach; ?>

        <!-- Código JavaScript para cargar dinámicamente las noticias usando AJAX -->
    </main>
    <!-- Pie de página -->
    <footer>
        <!-- Enlace al archivo de licencia y dirección de correo electrónico de contacto -->
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens al correu <a>example@ginebro.cat</a></p>
    </footer>
</body>
</html>