<?php
// Conexión a la base de datos (reemplázalo con tus propios datos de conexión)
session_start();
include('./config.php');

// Consultar las faq y respuestas desde la base de datos
$faq = [];
$sql = "SELECT * FROM faq";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $faq[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>faq - Eduquack</title>
</head>
<body>
    <h1>faq - Eduquack</h1>

    <!-- Lista de faq y respuestas -->
    <?php foreach ($faq as $noticia) : ?>
        <h2><?= htmlspecialchars($noticia['titulo']) ?></h2>
        <p><?= htmlspecialchars($noticia['contenido']) ?></p>
    <?php endforeach; ?>

    <?php
    // Cierra la conexión a la base de datos al finalizar
    $mysqli->close();
    ?>
</body>
</html>
