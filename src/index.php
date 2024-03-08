<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario e la BD
*/
include_once("config.php");

//Consulta de selección. Selecciona todos los coches de lujo ordenados de manera descendente por el campo id
$result = mysqli_query($mysqli, "SELECT * FROM luxury_cars ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Panel de control</title>
<!--    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
--> 
</head>
<body>
<!--    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
--> 
<div>
    <header>
        <h1>Panel de Control</h1>
    </header>

    <main>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="add.html">Alta</a></li>
    </ul>
    <h2>Listado de coches de lujo</h2>
    <table border="1">
    <thead>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Precio</th>
            <th>Color</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbdody>
<?php
//Genera la tabla de la página inicial
    while($res = mysqli_fetch_array($result)) {
        echo "<tr>\n";
        echo "<td>".$res['brand']."</td>\n";
        echo "<td>".$res['model']."</td>\n";
        echo "<td>".$res['year']."</td>\n";
        echo "<td>".$res['price']."</td>\n";
        echo "<td>".$res['color']."</td>\n";
        echo "<td>";
        //En la última columna se añaden dos enlaces para editar y eliminar el registro correspondiente. Se le pasa por el método GET el id del registro        
        echo "<a href=\"edit.php?id=$res[id]\">Editar</a>\n";
        echo "<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Está segur@ que desea eliminar el registro?')\" >Eliminar</a></td>\n";
        echo "</td>";
        echo "</tr>\n";
    }
//Cierra la conexión de BD previamente abierta hecho
    mysqli_close($mysqli);
    ?>
    </tbdody>
    </table>
    </main>
    <footer>
    Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>
