<!DOCTYPE html>
<html>
<head>
    <title>Registro de equipos de fútbol</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<h2 class="text-center pt-5 ">Selecciona los equipos </h2>;

<!--SELECTS-->
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4 d-flex justify-content-center">
            <!--Equipo1-->
            <select id="equipo" class="d-flex text-center m-2">
                <option>Equipo 1</option>
                <?php
                include("conexion.php");
                //get teams
                $getTeams ="SELECT equipo FROM registroequipos";
                $result = $conn->query($getTeams);
                if($result->num_rows> 0){
                    $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
                foreach ($options as $option) {
                    ?>
                    <option><?php echo $option['equipo']; ?> </option>
                    <?php
                }
                ?>
            </select>

            <!--Equipo2-->
            <select id="equipo2" class="text-center m-2">
                <option>Equipo 2</option>
                <?php
                include("conexion.php");
                $getTeams ="SELECT equipo FROM registroequipos";
                $result = $conn->query($getTeams);
                if($result->num_rows> 0){
                    $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
                foreach ($options as $option) {
                    ?>
                    <option><?php echo $option['equipo']; ?> </option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
</div>

<?php

include("conexion.php");
//Sacar
if (isset($_POST['valueequipo1'])) {
    $equipo1 = $_POST["variable"];
    echo "<script>console.log(" . $equipo1 . ")</script>";

}
else{
    echo "No recivi la variable del post :c";
}





// Consulta SQL para obtener los datos del equipo
$sql = "SELECT * FROM jugadores where equipo = '".$equipo1."'";
$sql2 = "SELECT * FROM jugadores where equipo = 'kokys'";
$resultado = $conn->query($sql);
$resultado2 = $conn->query($sql2);

// Comprobar si hay resultados
if ($resultado->num_rows > 0) {
    // Inicio de la tabla HTML
    echo "<br>";
    echo "<table class='table-bordered text-center d-flex justify-content-center' >";
    echo "<tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Goles</th><th>Faltas</th></tr>";

    // Recorrido de los resultados de la consulta y colocación de los datos en la tabla HTML
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>".$fila["nombre"]."</td><td>".$fila["apellidop"]."</td ><td>".$fila["apellidom"]."</td><td contenteditable='true'></td><td contenteditable='true'></td></tr>";
    }
    // Fin de la tabla HTML
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

//tabla equipo 2
if ($resultado2->num_rows > 0) {
    echo "<br><br><br>";
    echo "<table class='table-bordered text-center d-flex justify-content-center'>";
    echo "<tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Goles</th><th>Faltas</th></tr>";

    while($fila = $resultado2->fetch_assoc()) {
        echo "<tr><td>".$fila["nombre"]."</td><td>".$fila["apellidop"]."</td ><td>".$fila["apellidom"]."</td><td contenteditable='true'></td><td contenteditable='true'></td></tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
?>

<!--Boton-->
<br>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <button onclick='getEquipos()' type="button" class="btn btn-primary m-2" formmethod="post">Consultar</button>
            <button type="button" class="btn btn-primary m-2">Consultar</button>
        </div>
    </div>
</div>

<script>
</html>