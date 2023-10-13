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
            <th>Titol</th>
            <th>Data De publicació</th>
            <th>Completat</th>
            <th>Enllaç al formulari:</th>
        </tr>
        <tr>
            <td>Valoració Maria Expósito</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/PZtutZYFvaGbdPSz6">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Enric Matamala</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/LsNHNSnfnRBEVMde6">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Berta Tomàs</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/DXp2yXpvxyJc7vmv9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Mònica Llobera</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/C3hjq9jynPGYbh6u9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Carles Blasco</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/nfzc7sWNSMFSFXJ76">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Pilar Castellano</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/afBJnSXRyoakLajF7">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Carles Lorente</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/64vamjYb6eCEiJUq9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Gemma Pardell</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/vPqDLjKuCDTyQFxz8">Enllaç</a></td>
        </tr>
                              <!-- Nous -->
        <tr>
            <td>Valoració Cristina Vallcorba</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/M8NiiZRXQa3zsyoL9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Diego de la Torre</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/VqPP3XD8kTphSMpu5">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Gemma Querol</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/NrjMsPG6pBZpt9CN9">Enllaç</a></td>
        </tr>
        
        <tr>
            <td>Valoració Cristina Royo</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/jp9E9Cc7oFXenj6y6">Enllaç</a></td>
        </tr>
                            <!-- Checkpoint -->
        <tr>
            <td>Valoració Judit Molins</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/VpXz8BVKtpAyvnV28">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Txu Morillas</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/7YF6GcgkKnmXgyuW7">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Jose Cendón</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/73GWQUKXnJmhWBCLA">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Dolors Morcillo</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/YaNAZD8AybbNVhbPA">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Manel Lladó</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/RpoEtuk8WxZeWdHUA">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Alicia Molina</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/kUgeJkpW2MTifiAPA">Enllaç</a></td>
        </tr>

        <tr>
            <td>Valoració Patxi Perales</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/hFfotmLZsbCntPTK8">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Salvador Quadrades</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/Uihs26yUAzipKLFH7">Enllaç</a></td>
        </tr>
                                    <!-- checkpoint final -->
        <tr>
            <td>Valoració Pilar Castellano</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/afBJnSXRyoakLajF7">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Carles Lorente</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/64vamjYb6eCEiJUq9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Pilar Castellano</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/afBJnSXRyoakLajF7">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Carles Lorente</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/64vamjYb6eCEiJUq9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Pilar Castellano</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/afBJnSXRyoakLajF7">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Carles Lorente</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/64vamjYb6eCEiJUq9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Pilar Castellano</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/afBJnSXRyoakLajF7">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Carles Lorente</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/64vamjYb6eCEiJUq9">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Pilar Castellano</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/afBJnSXRyoakLajF7">Enllaç</a></td>
        </tr>
        <tr>
            <td>Valoració Carles Lorente</td>
            <td>Publicat: 13/10/2023</td>
            <td><input type="checkbox" name="completat"></td>
            <td><a href="https://forms.gle/64vamjYb6eCEiJUq9">Enllaç</a></td>
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
