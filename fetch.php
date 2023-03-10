<?php
if (isset($_POST['request'])){
    $request = $_POST['request'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="SELECT * FROM jugadores where equipo ='$request'";
    $result =mysqli_query($conn,$query);


    // Comprobar si hay resultados
    // Inicio de la tabla HTML
    echo "<br>";
    echo "<table class='table-bordered text-center d-flex justify-content-center' >";
    echo "<tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Goles</th><th>Faltas</th><th>Tarjetas Amarillas</th><th>Tarjetas Rojas</th></tr>";

    // Recorrido de los resultados de la consulta y colocación de los datos en la tabla HTML
    while($fila = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$fila["nombre"]."</td><td>".$fila["apellidop"]."</td ><td>".$fila["apellidom"]."</td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td></tr>";
    }
    // Fin de la tabla HTML
    echo "</table>";

};

if (isset($_POST['request2'])){
    $request2 = $_POST['request2'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="SELECT * FROM jugadores where equipo ='$request2'";
    $result =mysqli_query($conn,$query);

    //tabla equipo 2
    echo "<br><br><br>";
    echo "<table class='table-bordered text-center d-flex justify-content-center'>";
    echo "<tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Goles</th><th>Faltas</th><th>Tarjetas Amarillas</th><th>Tarjetas Rojas</th></tr>";

    while($fila = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$fila["nombre"]."</td><td>".$fila["apellidop"]."</td ><td>".$fila["apellidom"]."</td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
};


if (isset($_POST['requestliga'])){
    $request = $_POST['requestliga'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="select equipo from registroequipos where liga = '$request'";
    $result =mysqli_query($conn,$query);


};
?>
