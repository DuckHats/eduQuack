<?php
session_start();

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
            <li><a href="./formularis.php" class="negrita">
                    <h3>Valoracións</h3>
                </a></li>
            <li><a href="./perfil.php"><img id="conficon" src="images/user.png"></a></li>
        </ul>
    </menu>
    <main>
        <h1>Valoracións a l'escola Ginebró</h1>
        <p>Com a estudiants del Ginebró, estem compromesos a millorar la nostra escola. Per aconseguir-ho, estem implementant formularis anònims amb menys de 5 preguntes per valorar diversos espais i membres de la comunitat escolar.</p>
        <p>Al final de cada trimestre, publicarem els resultats d'aquestes avaluacions a la secció de Notícies. D'aquesta manera, podreu veure com es puntuen diferents aspectes de l'escola i col·laborar en la creació d'un millor entorn educatiu per a tots.</p>
        <!-- taula per els enllaços i la informació dels formularis. -->
        <table class="tabla-formularios">
            <tr>
                <th>Títol</th>
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
            <tr>
                <td>Valoració Pilar Ors</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/VQgiQxTbEP8Vc1Do7">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Isabel Ligero</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/7gtBFcYSzQucHGdw7">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Albert Macià</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/LCg4y2nZZJu2bcpb7">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Èrica Dotor</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/wQTFWYCALPHP28Tr8">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Pau Farell</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/i9duDqCSpY54o3YEA">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Núria Sellés</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/mmm9Q5FoWumGGUan8">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Eduard Gutiérrez</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/neVLcHTBqJWn2LTdA">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Xavi Sala</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/H1ouaJTSEFTcV8478">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Marc Lurbe</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/aqXCaPH6oaLthUVu8">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Eugeni Soy</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/VMqoNoEz3tVd5YEH6">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Àlex Funes</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/kTqNfj6raHHbPHU48">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Ivan Nieto</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/8neo8GmiWrzRpdM3A">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Vladimir Bellavista</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/EptVu1rq9jQEmxYcA">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Joan Pardo</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/ashwqwUksXoXb7sS9">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Virgínia Carmona</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/7Z1erUBcxdVSAdEq5">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Carles Margenat</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/68biEKA21fuPcErX6">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Maria Ramírez</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/URbMpY3Ej944NYuFA">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Angela Palacios</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/A81iAyn9jneYFK5V7">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Imanol Valle</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/RZSV6uyzinTwz8sn9">Enllaç</a></td>
            </tr>
            <tr>
                <td>Valoració Sofia Torrado</td>
                <td>Publicat: 13/10/2023</td>
                <td><input type="checkbox" name="completat"></td>
                <td><a href="https://forms.gle/Fx8or9LzwaeB4oZr5">Enllaç</a></td>
            </tr>
            <!-- Final forms -->
        </table>
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
            <h2>Section</h2>
            <ul>
                <li ><a href="#" >Home</a></li>
                <li ><a href="#" >Features</a></li>
                <li ><a href="#" >Pricing</a></li>
                <li ><a href="#" >FAQs</a></li>
                <li ><a href="#" >About</a></li>
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