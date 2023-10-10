<?php
define('DBSERVER', 'localhost'); // Cambia localhost si tu base de datos está en un servidor remoto
define('DBUSERNAME', 'root'); // Cambia tu_usuario al nombre de usuario de tu base de datos
define('DBPASSWORD', '1234'); // Cambia tu_contraseña a la contraseña de tu base de datos
define('DBNAME', 'users'); // Cambia nombredelabasededatos al nombre de tu base de datos

/* COnectar a la base de dades */
$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
 
// comprobar conexió
if($db === false){
    die("ERROR: connection error. " . mysqli_connect_error());
}
?>