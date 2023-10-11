<?php
session_start();
require_once('news_database.php'); // Incluye el archivo de conexión a la base de datos

// Obtén el ID del curso del usuario desde la sesión (ajusta según tu sistema de autenticación)
$id_curso_usuario = $_SESSION['id_curso']; 

// Número de noticias por página
$noticias_por_pagina = 10;

// Página actual, o establece la página en 1 por defecto si no se proporciona en la URL
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Filtro por fechas, si se proporcionan en el formulario
$fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';

// Consulta SQL para obtener las noticias específicas del curso del usuario
$sql = "SELECT * FROM noticias WHERE id_curso = $id_curso_usuario";

// Aplica el filtro por fechas si se proporcionan fechas válidas
if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    // Validar y limpiar las fechas para prevenir SQL injection (debes implementar una función de limpieza adecuada)
    $fecha_inicio = mysqli_real_escape_string($conn, $fecha_inicio);
    $fecha_fin = mysqli_real_escape_string($conn, $fecha_fin);

    // Agrega filtro por fechas a la consulta SQL
    $sql .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
}

// Ordena las noticias por fecha en orden descendente y aplica la paginación
$sql .= " ORDER BY fecha DESC LIMIT " . (($pagina_actual - 1) * $noticias_por_pagina) . ", $noticias_por_pagina";

// Realiza la consulta a la base de datos
$result = $conn->query($sql);

// Muestra las noticias
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . htmlspecialchars($row["titulo"]) . "</h2>";
        echo "<p>" . htmlspecialchars($row["contenido"]) . "</p>";
        echo "<hr>";
    }
} else {
    echo "No hay noticias disponibles para este curso.";
}

// Calcula y muestra enlaces de paginación
for ($i = 1; $i <= $total_paginas; $i++) {
    echo "<a href='noticias.php?pagina=$i'>$i</a> ";
}

// Formulario de filtrado por fechas
echo "<form action='noticias.php' method='get'>
        <label for='fecha_inicio'>Fecha de Inicio:</label>
        <input type='date' name='fecha_inicio' value='$fecha_inicio'>
        <label for='fecha_fin'>Fecha de Fin:</label>
        <input type='date' name='fecha_fin' value='$fecha_fin'>
        <input type='submit' value='Filtrar'>
      </form>";

// Cierra la conexión a la base de datos
$conn->close();
?>
