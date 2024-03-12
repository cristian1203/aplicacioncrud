<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

/*Comprueba si hemos llegado a esta página PHP a través del formulario de modificaciones. 
En este caso comprueba la información "modifica" procedente del botón Guardae del formulario de Modificaciones
Transacción de datos utilizando el método: POST
*/
if(isset($_POST['modifica'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$brand = mysqli_real_escape_string($mysqli, $_POST['brand']);
	$model = mysqli_real_escape_string($mysqli, $_POST['model']);
	$year = mysqli_real_escape_string($mysqli, $_POST['year']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
	$color = mysqli_real_escape_string($mysqli, $_POST['color']);

	if(empty($brand) || empty($model) || empty($year) || empty($price) || empty($color))	{
		if(empty($brand)) {
			echo "<font color='red'>Campo marca vacío.</font><br/>";
		}

		if(empty($model)) {
			echo "<font color='red'>Campo modelo vacío.</font><br/>";
		}

		if(empty($year)) {
			echo "<font color='red'>Campo año vacío.</font><br/>";
		}

		if(empty($price)) {
			echo "<font color='red'>Campo precio vacío.</font><br/>";
		}

		if(empty($color)) {
			echo "<font color='red'>Campo color vacío.</font><br/>";
		}
	} //fin si
	else 
	{
//Prepara una sentencia SQL para su ejecución. En este caso una modificación de un registro de la BD.				
		$stmt = mysqli_prepare($mysqli, "UPDATE luxury_cars SET brand=?, model=?, year=?, price=?, color=? WHERE id=?");
/*Enlaza variables como parámetros a una setencia preparada. 
s: La variable correspondiente tiene tipo cadena
i: La variable correspondiente tiene tipo entero
d: La variable correspondiente tiene tipo doble
*/				
		mysqli_stmt_bind_param($stmt, "ssidsi", $brand, $model, $year, $price, $color, $id);
//Ejecuta una consulta preparada			
		mysqli_stmt_execute($stmt);
//Libera la memoria donde se almacenó el resultado
		mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada		
		mysqli_stmt_close($stmt);

		header("Location: index.php");
	}// fin sino
}//fin si
?>


<?php
/*Obtiene el id del dato a modificar a partir de la URL. Transacción de datos utilizando el método: GET*/
$id = $_GET['id'];

$id = mysqli_real_escape_string($mysqli, $id);


//Prepara una sentencia SQL para su ejecución. En este caso selecciona el registro a modificar y lo muestra en el formulario.				
$stmt = mysqli_prepare($mysqli, "SELECT brand, model, year, price, color FROM luxury_cars WHERE id=?");
//Enlaza variables como parámetros a una setencia preparada. 
mysqli_stmt_bind_param($stmt, "i", $id);
//Ejecuta una consulta preparada
mysqli_stmt_execute($stmt);
//Enlaza variables a una setencia preparada para el almacenamiento del resultado
mysqli_stmt_bind_result($stmt, $brand, $model, $year, $price, $color);
//Obtiene el resultado de una sentencia SQL preparada en las variables enlazadas
mysqli_stmt_fetch($stmt);
//Libera la memoria donde se almacenó el resultado		
mysqli_stmt_free_result($stmt);
//Cierra la sentencia preparada
mysqli_stmt_close($stmt);
//Cierra la conexión de base de datos previamente abierta
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Modificación coche de lujo</title>
</head>

<body>
<div>
	<header>
		<h1>Panel de Control</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación coche de lujo</h2>
<!--Formulario de edición. 
Al hacer click en el botón Guardar, llama a esta misma página: edit.php-->
	<form action="edit.php" method="post">
		<div>
			<label for="brand">Marca</label>
			<input type="text" name="brand" id="brand" value="<?php echo $brand;?>" required>
		</div>

		<div>
			<label for="model">Modelo</label>
			<input type="text" name="model" id="model" value="<?php echo $model;?>" required>
		</div>

		<div>
			<label for="year">Año</label>
			<input type="number" name="year" id="year" value="<?php echo $year;?>" required>
		</div>

		<div>
			<label for="price">Precio</label>
			<input type="number" step="0.01" name="price" id="price" value="<?php echo $price;?>" required>
		</div>

		<div>
			<label for="color">Color</label>
			<input type="text" name="color" id="color" value="<?php echo $color;?>" required>
		</div>

		<div >
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>

	</main>	
	<footer>
	Created by the IES Miguel Herrero team &copy; 2024
  	</footer>
</div>
</body>
</html>
