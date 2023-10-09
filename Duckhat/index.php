<?php
// Inicia la sesión
session_start();
 
// Verifica si el usuario ha iniciado sesión, si no, redirígelo a la página de inicio de sesión
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | Duckhat</title>
    <link rel="icon" href="images/ginebro-logo (1).png">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <li><a href="index.php"><h3 class="negrita">Menú</h3></a></li>
            <li><a href="teams.html"><h3>Grups</h3></a></li>
            <li><a href="news.html"><h3>Notícies</h3></a></li>
            <li><a href="perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>  
    </menu>
    
    <main>
        <!-- Contenido personalizado para la página de bienvenida -->
        <div class="welcome-message">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
            <p>Gracias por iniciar sesión en Duckhat. ¡Disfruta explorando nuestro sitio!</p>
            <!-- Puedes agregar más contenido personalizado aquí según tus necesidades -->
        </div>
    </main>
    
    <footer>
        <a href="../Duckhat/Legal/License.pdf">Tots els drets reservats a Duckhat</a>
        <p>Contactens al correu <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>
</body>
</html>
