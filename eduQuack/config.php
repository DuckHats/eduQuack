<?php
define('DB_SERVER', 'localhost'); // Reemplaza 'nombre_del_servidor' con el nombre de tu servidor de base de datos
define('DB_USERNAME', 'root'); // Reemplaza 'nombre_de_usuario' con tu nombre de usuario de MySQL
define('DB_PASSWORD', '1234'); // Reemplaza 'contraseña' con tu contraseña de MySQL
define('DB_DATABASE', 'eduQuack'); // Reemplaza 'usuarios' con el nombre de tu base de datos

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if($mysqli === false){
    die("ERROR: No se pudo conectar a la base de datos. " . $mysqli->connect_error);
}
?>
