<?php
session_start();
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: index.php");
//     exit;
// }

include('news_database.php'); // Inclou el fitxer de configuració de la base de dades

// Obté dades del formulari
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = $_POST['fecha'];
$curso = $_POST['curso'];

// Processa la imatge
$imagen = $_FILES['imagen']['name'];
$imagen_temp = $_FILES['imagen']['tmp_name'];
move_uploaded_file($imagen_temp, "carpeta_imagenes/$imagen");

// Inserta la noticia a la base de dades
$sql = "INSERT INTO noticias (titulo, contenido, fecha, curso, imagen) VALUES ('$titulo', '$contenido', '$fecha', '$curso', '$imagen')";
if ($mysqli->query($sql) === TRUE) {
    echo "Noticia añadida correctamente. <a href='formulario_noticias.php'>Volver</a>";
} else {
    echo "Error al añadir la noticia: " . $mysqli->error;
}

$mysqli->close();
?>
