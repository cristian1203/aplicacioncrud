<?php
// Define los parámetros de conexión a la base de datos.
// Los parámetros se toman del fichero de variables de entorno: .env
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));

// Abre una nueva conexión al servidor MySQL/MariaDB
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verifica si hay errores de conexión
if ($mysqli->connect_errno) {
    printf('Falló la conexión: %s\n', $mysqli->connect_error);
    exit();
}
?>


