<?php
define('DB_HOST', 'localhost'); // Cambia localhost si tu base de datos está en un servidor remoto
define('DB_USER', 'root'); // Cambia tu_usuario al nombre de usuario de tu base de datos
define('DB_PASS', '1234'); // Cambia tu_contraseña a la contraseña de tu base de datos
define('DB_NAME', 'users'); // Cambia nombredelabasededatos al nombre de tu base de datos

/* COnectar a la base de dades */
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
// comprobar conexió
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>