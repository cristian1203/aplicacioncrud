<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <title>Registro de Coches de Lujo</title>
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
            <h1>Registro de Coches de Lujo</h1>
        </header>

        <main>
            <?php
            // Incluye fichero con parámetros de conexión a la base de datos
            include_once("config.php");

            /* Comprueba si hemos llegado a esta página PHP a través del formulario de altas. 
            En este caso comprueba la información "inserta" procedente del botón Agregar del formulario de altas
            Transacción de datos utilizando el método: POST
            */
            if(isset($_POST['inserta'])) 
            {
                // Obtiene los datos (brand, model, year, price) a partir del formulario de alta por el método POST
                $brand = mysqli_real_escape_string($mysqli, $_POST['brand']);
                $model = mysqli_real_escape_string($mysqli, $_POST['model']);
                $year = mysqli_real_escape_string($mysqli, $_POST['year']);
                $price = mysqli_real_escape_string($mysqli, $_POST['price']);
                $color = mysqli_real_escape_string($mysqli, $_POST['color']);

                // Comprueba si existen campos vacíos
                if(empty($brand) || empty($model) || empty($year) || empty($price)) 
                {
                    if(empty($brand)) {
                        echo "<div>La marca del coche está vacía.</div>";
                    }

                    if(empty($model)) {
                        echo "<div>El modelo del coche está vacío.</div>";
                    }

                    if(empty($year)) {
                        echo "<div>El año del coche está vacío.</div>";
                    }

                    if(empty($price)) {
                        echo "<div>El precio del coche está vacío.</div>";
                    }

                    // Enlace a la página anterior
                    echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
                } else {
                    // Prepara una sentencia SQL para su ejecución. En este caso el alta de un registro de la BD.
                    $stmt = mysqli_prepare($mysqli, "INSERT INTO luxury_cars (brand, model, year, price, color) VALUES(?,?,?,?,?)");

                    // Enlaza variables como parámetros a una setencia preparada.
                    mysqli_stmt_bind_param($stmt, "ssdis", $brand, $model, $year, $price, $color);

                    // Ejecuta una consulta preparada
                    mysqli_stmt_execute($stmt);

                    // Cierra la sentencia preparada
                    mysqli_stmt_close($stmt);

                    // Muestra mensaje exitoso
                    echo "<div>Coche añadido correctamente</div>";
                    echo "<a href='index.php'>Ver resultados</a>";
                }
            }

            // Cierra la conexión
            mysqli_close($mysqli);
            ?>
        </main>
        <footer>
            Created by the IES Miguel Herrero team &copy; 2024
        </footer>
    </div>
</body>
</html>
