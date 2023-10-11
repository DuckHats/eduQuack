<?php
session_start();

// Verificar inicio de sesión
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}

// Incluir archivo de configuración de la base de datos
require_once('news_database.php');

// Configuración para paginación
$noticiasPorPagina = 5;
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $noticiasPorPagina;

// Obtener el filtro del formulario (si está presente)
$filtroCurso = isset($_GET['curso']) ? $_GET['curso'] : 'todos';
$filtroConsulta = ($filtroCurso !== 'todos') ? "WHERE curso = '$filtroCurso'" : '';

// Consulta SQL con paginación y filtro por curso
$sql = "SELECT titulo, contenido, fecha FROM noticias $filtroConsulta ORDER BY fecha DESC LIMIT $inicio, $noticiasPorPagina";
$result = $conn->query($sql);

// Consulta para contar el total de noticias con el filtro
$sqlTotalNoticias = "SELECT COUNT(*) as total FROM noticias $filtroConsulta";
$resultTotalNoticias = $conn->query($sqlTotalNoticias);
$totalNoticias = $resultTotalNoticias->fetch_assoc()['total'];

// Calcular el total de páginas
$totalPaginas = ceil($totalNoticias / $noticiasPorPagina);

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News | eduQuack</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Menú de navegación -->
    <menu>
        <!-- Tu menú aquí -->
    </menu>
    <main>
        <!-- Contenedor para mostrar las noticias dinámicamente -->
        <div id="noticias-container">
            <?php foreach ($noticias as $noticia): ?>
                <div class="noticia">
                    <h2><?php echo htmlspecialchars($noticia['titulo']); ?></h2>
                    <p><?php echo htmlspecialchars($noticia['contenido']); ?></p>
                    <p>Fecha: <?php echo htmlspecialchars($noticia['fecha']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Paginación -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <a href="?pagina=<?php echo $i . '&curso=' . $filtroCurso; ?>" <?php if ($i == $paginaActual) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>

        <!-- Filtro por curso -->
        <form action="" method="get" id="filtro-form">
            <label for="curso">Filtrar por curso:</label>
            <select id="curso" name="curso">
                <option value="todos" <?php if ($filtroCurso === 'todos') echo 'selected'; ?>>Todos</option>
                <option value="curso1" <?php if ($filtroCurso === 'curso1') echo 'selected'; ?>>Curso 1</option>
                <option value="curso2" <?php if ($filtroCurso === 'curso2') echo 'selected'; ?>>Curso 2</option>
                <option value="curso3" <?php if ($filtroCurso === 'curso3') echo 'selected'; ?>>Curso 3</option>
                <!-- Agrega más opciones de cursos según sea necesario -->
            </select>
            <input type="submit" value="Filtrar">
        </form>
    </main>

    <!-- Pie de página -->
    <footer>
        <!-- Tu pie de página aquí -->
    </footer>
</body>

</html>
