<?php
// Incluye fichero con parámetros de conexión a la base de datos
include("config.php");

// Obtiene el id del dato a eliminar a partir de la URL
$id = $_GET['id'];

// Prepara una sentencia SQL para eliminar un registro de la BD
$stmt = mysqli_prepare($mysqli, "DELETE FROM luxury_cars WHERE id=?");

// Enlaza variables como parámetros a la sentencia preparada
mysqli_stmt_bind_param($stmt, "i", $id);

// Ejecuta la consulta preparada
mysqli_stmt_execute($stmt);

// Cierra la sentencia preparada
mysqli_stmt_close($stmt);

// Cierra la conexión de base de datos previamente abierta
mysqli_close($mysqli);

// Redirige a la página principal: index.php
header("Location:index.php");
?>
