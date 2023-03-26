<?php
?>
<?php
if (isset($_POST['request'])){
    $request = $_POST['request'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="SELECT * FROM jugadores where equipo ='$request'";
    $result =mysqli_query($conn,$query);


    // Comprobar si hay resultados
    // Inicio de la tabla HTML
    echo "<br>";
    echo "<form method='POST'>";
    echo "<table id='tabla1' class='table-bordered text-center d-flex justify-content-center' >";
    echo "<tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Goles</th><th>Faltas</th><th>Tarjetas Amarillas</th><th>Tarjetas Rojas</th></tr>";

    // Recorrido de los resultados de la consulta y colocación de los datos en la tabla HTML
    while($fila = mysqli_fetch_assoc($result)) {
        echo "<tr>
                  <td><input type='text' name='nombre_' value=".$fila['nombre']."></td>
                  <td><input type='text' name='apellidop_' value=".$fila['apellidop']."></td >
                  <td><input type='text' name='apellidom_' value=".$fila['apellidom']."></td>
                  <td><input type='text' name='goles_'></td>
                  <td><input type='text' name='faltas_'></td>
                  <td><input type='text' name='ta_'></td>
                  <td><input type='text' name='tr_'></td>
 
              </tr>";
    }
    // Fin de la tabla HTML
    echo "</table>";
    echo "<br>";
    echo "<div class='container'>";
    echo "<div class='row d-flex justify-content-center'>";
    echo "<div class='text-center form-outline w-25 justify-content-center'>";
    echo "<label for='jornada' class='form-label'>Numero Jornada</label>";
    echo "<input type='text' class='form-control text-center' id='jornada' name='jornada'>";
    echo "<label for='equipoo' class='form-label'>Equipo</label>";
    echo "<input type='text' class='form-control text-center' id='equipoo' name='equipoo'>";
    echo "</div>";
    echo "</div>";

    echo "<div class='mb-2 text-center py-2'>";
    echo "<button id='registrar' class='btn btn-primary m-2'>Registrar Partido</button>";
    echo "</div>";
    echo "</form>";

};



if (isset($_POST['request2'])){
    $request2 = $_POST['request2'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="SELECT * FROM jugadores where equipo ='$request2'";
    $result =mysqli_query($conn,$query);

    //tabla equipo 2
    echo "<form method='POST'>";
    echo "<table class='table-bordered text-center d-flex justify-content-center'>";
    echo "<tr><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Goles</th><th>Faltas</th><th>Tarjetas Amarillas</th><th>Tarjetas Rojas</th></tr>";

    while($fila = mysqli_fetch_assoc($result)) {
        echo "<tr>
                  <td><input type='text' name='nombre_' value=".$fila['nombre']."></td>
                  <td><input type='text' name='apellidop_' value=".$fila['apellidop']."></td >
                  <td><input type='text' name='apellidom_' value=".$fila['apellidom']."></td>
                  <td<input type='text' name='goles_'></td>
                  <td><input type='text' name='faltas_'></td>
                  <td><input type='text' name='ta_'></td>
                  <td><input type='text' name='tr_'></td>
                  <td><input type='text' name='tr_'></td>
              </tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<div class='container'>";
    echo "<div class='row d-flex justify-content-center'>";
    echo "<div class='text-center form-outline w-25 justify-content-center'>";
    echo "<label for='jornada2' class='form-label'>Numero Jornada</label>";
    echo "<input type='text' class='form-control text-center' id='jornada' name='jornada'>";
    echo "</div>";
    echo "</div>";

    echo "<div class='mb-2 text-center py-2'>";
    echo "<button id='registrar2' class='btn btn-primary m-2'>Registrar Partido</button>";
    echo "</div>";
    echo "</form>";
    mysqli_close($conn);

};


if (isset($_POST['requestliga'])){
    $request = $_POST['requestliga'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="select equipo from registroequipos where liga = '$request'";
    $result =mysqli_query($conn,$query);
};

?>
