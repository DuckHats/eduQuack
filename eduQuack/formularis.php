<?php
session_start();
include('config.php');

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
            <li><a href="./index.php">
                    <h3>Home</h3>
                </a></li>
            <li><a href="./dev-teams.php">
                    <h3>Grups</h3>
                </a></li>
            <li><a href="./news.php">
                    <h3>Notícies</h3>
                </a></li>
            <li><a href="./Foro/Blog.php">
                    <h3>Forum</h3>
                </a></li>
            <li><a href="./formularis.php">
                    <h3 class="negrita">Valoracións</h3>
                </a></li>
            <li><a href="./perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>
    </menu>
    <main id="formularis">
        <h1>Valoracións a l'escola Ginebró</h1>
        <p>Com a estudiants del Ginebró, estem compromesos a millorar la nostra escola. Per aconseguir-ho, estem implementant formularis anònims amb menys de 5 preguntes per valorar diversos espais i membres de la comunitat escolar.</p>
        <p>Al final de cada trimestre, publicarem els resultats d'aquestes avaluacions a la secció de Notícies. D'aquesta manera, podreu veure com es puntuen diferents aspectes de l'escola i col·laborar en la creació d'un millor entorn educatiu per a tots.</p>
        <!-- taula per els enllaços i la informació dels formularis. -->
        <?php
// Supongamos que ya tienes la conexión a la base de datos establecida

// Consulta a la base de datos
$query = "SELECT * FROM valoracio";
$result = $mysqli->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    // Inicio de la tabla
    echo '<table class="tabla-formularios">';
    echo '<tr>';
    echo '<th>Títol</th>';
    echo '<th>Data De publicació</th>';
    echo '<th>Completat</th>';
    echo '<th>Enllaç al formulari:</th>';
    echo '</tr>';

    // Itera sobre los resultados y genera las filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>Valoració ' . $row['titol'] . '</td>';
        echo '<td>Publicat: ' . $row['data_publicacio'] . '</td>';
        echo '<td><input type="checkbox" name="completat"></td>';
        echo '<td><a href="' . $row['enllac_formulari'] . '">Enllaç</a></td>';
        echo '</tr>';
    }

    // Fin de la tabla
    echo '</table>';
} else {
    // Mensaje si no hay resultados
    echo 'No se encontraron registros.';
}

// Cierra la conexión a la base de datos
$mysqli->close();
?>

    </main>

    <!-- Pie de página -->
    <footer>
        <section>
            <div>
            <h2>Links</h2>
            <ul>
                <li ><a href="./index.php" >Home</a></li>
                <li ><a href="./dev-teams.php" >Grups</a></li>
                <li ><a href="./news.php" >Notícies</a></li>
                <li ><a href="./Foro/Blog.php" >Forum</a></li>
                <li ><a href="./formularis.php" >Valoracións</a></li>
            </ul>
            </div>
               <div>
            <h2>Politics</h2>
            <ul>
                <li ><a href="./view/Política_de_privacitat.md" >Política de privacitat</a></li>
                <li ><a href="./view/Política_us.md" >Politiques d'ús</a></li>
                <li ><a href="./view/Reglamento_General_de_Protección_de_Datos(RGPD).md" >RGPD</a></li>
                <li ><a href="./view/LICENSE" >Llicencia</a></li>
                <li ><a href="./faq.php" >FAQ</a></li>
            </ul>
            </div>
            <div id="newsletter">
                <h2>Subscriute al nostre newsletter</h2>
                <h4>Tota la informació sobre millores i actualitzacions del nostre sistema.</h4>
                <input  type="text" placeholder="Email address">
                <button type="submit">Subscribe</button>
                <p>Contactens per correu a: <a href="mailto:duck4hats@gmail.com">duck4hats@gmail.com</a></p>
            </div>
        </section>
        <div id="copyright">
        <p>&copy; 2023 DuckHats. All rights reserved.</p>
        <ul>
            <li><a href="https://twitter.com/Hats4Ducks"><img src="./images/twitter (1).png" alt="Twitter"></a></li>
            <li><a href=""><img src="./images/instagram (1).png" alt="Instagram"></a></li>
            <li><a href="https://duckhats.github.io/"><img src="./images/github (1).png" alt="Github"></a></li>
        </ul>
        </div>
    </footer>
</body>

</html>