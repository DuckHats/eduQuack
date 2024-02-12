<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración de la codificación de caracteres y el tamaño de la ventana de visualización -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página y enlace al icono en la pestaña del navegador -->
    <title>Valoracións | eduQuack</title>
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
            <li><a href="news.php"><h3>Notícies</h3></a></li>
            <li><a href="./Foro/Blog.php"><h3>Forum</h3></a></li>
            <li><a href="./formularis.php" class="negrita"><h3>Valoracións</h3></a></li>
            <li><a href="perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>
    </menu>
    <main>
        <h1>Valoracions a l'escola Ginebró</h1>
        <p>Com a estudiants del Ginebró, estem compromesos a millorar la nostra escola. Per aconseguir-ho, estem implementant formularis anònims amb menys de 5 preguntes per avaluació. Aquests formularis ens permetran valorar diversos espais i membres de la comunitat escolar. Les respostes seran totalment anònimes.</p>
        <p>Al final de cada trimestre, publicarem els resultats d'aquestes avaluacions a la secció de Notícies. D'aquesta manera, podreu veure com es puntuen diferents aspectes de l'escola i col·laborar en la creació d'un millor entorn educatiu per a tots.</p>
        <!-- taula per els enllaços i la informació dels formularis. -->
        <table>
        <tr>
            <th>Título del Formulario</th>
            <th>Fecha de Publicación</th>
            <th>Completado</th>
            <th>Enlace al Formulario</th>
        </tr>
        <tr>
            <td>Formulario 1</td>
            <td>10/10/2023</td>
            <td><input type="checkbox" name="completado"></td>
            <td><a href="URL_del_formulario_1">Enlace al Formulario 1</a></td>
        </tr>
        <tr>
            <td>Formulario 2</td>
            <td>11/10/2023</td>
            <td><input type="checkbox" name="completado"></td>
            <td><a href="URL_del_formulario_2">Enlace al Formulario 2</a></td>
        </tr>
        <!-- Agrega más filas según sea necesario para otros formularios -->
    </table>    
    </main>

    <!-- Pie de página -->
    <footer>
        <!-- Enlace al archivo de licencia y dirección de correo electrónico de contacto -->
        <a href="../eduQuack/Legal/License.pdf">Tots els drets reservats a eduQuack</a>
        <p>Contactens al correu <a>example@ginebro.cat</a></p>
    </footer>
</body>
</html>
