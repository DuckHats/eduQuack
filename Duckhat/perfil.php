<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuració | Duckhat</title>
    <!-- Configura el icono de la pestaña del navegador -->
    <link rel="icon" href="images/ginebro-logo (1).png">
    <!-- Enlaza el archivo de estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
// Inicia la sesión
session_start();

// Comprueba si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, redirige al usuario a la página de inicio de sesión
    header("Location: login.html");
    exit();
}

// Resto del contenido de perfil.php
// Puedes acceder a $_SESSION['user_id'] y otras variables de sesión aquí

// Ejemplo: Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Aquí puedes realizar operaciones adicionales basadas en la sesión del usuario
?>
    <!-- Barra de navegación superior -->
    <menu>
        <img src="images/ginebro-logo (1).png">
        <ul>
            <!-- Enlaces a diferentes secciones del sitio web -->
            <li><a href="index.html"><h3>Menú</h3></a></li>
            <li><a href="teams.html"><h3>Grups</h3></a></li>
            <li><a href="news.html"><h3>Notícies</h3></a></li>
            <!-- Enlace al perfil del usuario -->
            <li><a href="perfil.php"><img id="conficon" src="images/userselec.png"></a></li>
        </ul> 
    </menu>

    <!-- Contenido principal de la página -->
    <main>
        <!-- Barra lateral izquierda con opciones de configuración -->
        <div id="sidebarconf">
            <ul>
                <!-- Enlaces internos a secciones específicas de la página de configuración -->
                <li><a href="#perfil">Perfil</a></li>
                <li><a href="#email">E-mail</a></li>
                <li><a href="#contrasenya">Contrasenya</a></li>
            </ul>
        </div>
        
        <!-- Contenido de la configuración del usuario -->
        <div id="infoconf">
            <!-- Sección de perfil del usuario -->
            <h2 id="perfil">Perfil</h2>
            <ul>
                <!-- Campos de información del usuario (Username, Nombre Completo, Número telefónico) con valores incrustados desde PHP -->
                <li>
                    <h3>Username</h3>
                    <input type="text" value="<?php echo $username; ?>">
                    <p>ID de usuario: <span id="userId"></span></p>
                </li>
                <li>
                    <h3>Nom complet</h3>
                    <input type="text" value="<?php echo $nombreCompleto; ?>">
                </li>
                <li>
                    <h3>Número telefònic</h3>
                    <input type="tel" value="<?php echo $numeroTelefonico; ?>">
                </li>
            </ul>
            <!-- Imagen de avatar del usuario -->
            <img src="images/avatar.png" alt="avatar">

            <!-- Sección de correo electrónico del usuario -->
            <h2 id="email">E-mail</h2>
            <!-- Campo de correo electrónico con valor incrustado desde PHP -->
            <input type="email" value="<?php echo $email; ?>">

            <!-- Sección de cambio de contraseña -->
            <h2 id="contrasenya">Contrasenya</h2>
            <!-- Campos para ingresar y confirmar la nueva contraseña -->
            <input type="password" placeholder="Nova contrasenya">
            <input type="password" placeholder="Confirma la nova contrasenya">

            <!-- Botones de actualización y cierre de sesión -->
            <input type="submit" onclick="window.location.href = 'perfil.php';" value="Actualitzar">
            <input id="logout" type="submit" onclick="window.location.href = 'login.html';" value="Logout">
            <!-- Imagen de código QR -->
            <img src="images/qr.png" alt="Qr">
        </div>
    </main>
    
    <!-- Pie de página del sitio web -->
    <footer>
        <!-- Enlace al documento de licencia -->
        <a href="../Duckhat/Legal/License.pdf">Tots els drets reservats a Duckhat</a>
        <!-- Información de contacto -->
        <p>Contactens al correu <a href="mailto:example@ginebro.cat">example@ginebro.cat</a></p>
    </footer>
</body>
</html>
