<?php
session_start();
include('news_database.php');

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}

// Establecer la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obtener las noticias
$sql = "SELECT titulo, contenido, fecha FROM noticias";
$result = $conn->query($sql);

// Crear un array para almacenar las noticias
$noticias = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Agrega cada noticia como un array asociativo al array de noticias
        $noticias[] = array(
            'titulo' => htmlspecialchars($row["titulo"]),
            'contenido' => htmlspecialchars($row["contenido"]),
            'fecha' => htmlspecialchars($row["fecha"])
        );
    }
}

// Cerrar la conexión a la base de datos
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
    <!-- Inclusión de jQuery para utilizar AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Menú de navegación -->
    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <!-- Enlaces a otras páginas del sitio web -->
            <li><a href="index.php"><h3>Menú</h3></a></li>
            <li><a href="teams.php"><h3>Grups</h3></a></li>
            <li><a href="news.php"><h3 class="negrita">Notícies</h3></a></li>
            <li><a href="./Foro/Blog.php"><h3>Forum</h3></a></li>
            <li><a href="perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>
    </menu>
    <main>
        <!-- Contenedor para mostrar las noticias dinámicamente -->
        <div id="noticias-container"></div>

        <!-- Código JavaScript para cargar dinámicamente las noticias usando AJAX -->
        <script>
            $(document).ready(function() {
                // Función para cargar noticias usando AJAX
                function cargarNoticias() {
                    // Llena dinámicamente las noticias en el contenedor
                    var noticiasContainer = $('#noticias-container');
                    noticiasContainer.empty(); // Limpia el contenedor
                    <?php foreach ($noticias as $noticia): ?>
                        // Crea un elemento de noticia y agrega al contenedor
                        var noticiaElement = $('<div class="noticia">');
                        noticiaElement.append('<h2><?php echo $noticia["titulo"]; ?></h2>');
                        noticiaElement.append('<p><?php echo $noticia["contenido"]; ?></p>');
                        noticiaElement.append('<p> <?php echo $noticia["fecha"]; ?>"</p>');
                        noticiasContainer.append(noticiaElement);
                    <?php endforeach; ?>
                }

                // Llama a la función para cargar noticias cuando la página se carga
                cargarNoticias();
            });
        </script>
    </main>
    <!-- Pie de página -->
    <footer>
        <!-- Enlace al archivo de licencia y dirección de correo electrónico de contacto -->
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens al correu <a>example@ginebro.cat</a></p>
    </footer>
</body>
</html>
