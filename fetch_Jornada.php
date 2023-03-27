<?php
if (isset($_POST['jornada'])){

    //TABLA GENERAL
    $request = $_POST['jornada'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="SELECT equipo,SUM(goles) AS 'GOLES TOTALES',sum(faltas) AS 'FALTAS TOTALES',SUM(tarjetaamarilla) AS 'TARJETAS AMARILLAS',SUM(tarjetaroja) AS 'TARJETAS ROJAS' FROM jornada where id = '$request' GROUP BY equipo";
    $result =mysqli_query($conn,$query);

    // Comprobar si hay resultados
    // Inicio de la tabla HTML
    echo "<br>";
    echo "<table class='table-bordered text-center d-flex justify-content-center table' >";
    echo "<tr><th width=\"15%\">Equipo</th><th width=\"25%\">Goles Totales</th><th width=\"25%\">Faltas Totales</th><th width=\"2%\">Tarjetas Amarillas</th><th width=\"2%\">Tarjetas Rojas</th></tr>";

    // Recorrido de los resultados de la consulta y colocación de los datos en la tabla HTML
    while($fila = mysqli_fetch_array($result)) {
        echo "<tr><td class='equipo'>".$fila["equipo"]."</td><td class='GOLES TOTALES'>".$fila["GOLES TOTALES"]."</td><td class='FALTAS TOTALES'>".$fila["FALTAS TOTALES"]."</td ><td class='TARJETAS AMARILLAS'>".$fila["TARJETAS AMARILLAS"]."</td><td class='TARJETAS ROJAS'>".$fila["TARJETAS ROJAS"]."</td></tr>";
    }
    // Fin de la tabla HTML
    echo "</table>";};

    //TARJETAS AMARILLAS
    if (isset($_POST['jornadata'])){

        //TABLA GENERAL
        $request = $_POST['jornadata'];
        $conn=mysqli_connect('localhost','root','admin','bd_ed');
        $query ="SELECT equipo as team,(SELECT jugador from jornada where equipo=team and id= '$request' group by jugador,apellidom,apellidop order by sum(tarjetaamarilla) desc limit 1) as nombre ,(SELECT SUM(tarjetaamarilla)  from jornada where equipo=team and id= '$request' group by jugador,apellidom,apellidop order by sum(tarjetaamarilla) desc limit 1) as TarjetasAmarillas from jornada  group by equipo";
        $result =mysqli_query($conn,$query);
    
        // Comprobar si hay resultados
        // Inicio de la tabla HTML
        echo "<br>";
        echo "<table class='table-bordered text-center d-flex justify-content-center table' >";
        echo "<tr><th width=\"15%\">Equipo</th><th width=\"25%\">Jugador</th><th width=\"25%\">Tarjetas Amarillas Totales</th></tr>";
    
        // Recorrido de los resultados de la consulta y colocación de los datos en la tabla HTML
        while($fila = mysqli_fetch_array($result)) {
            echo "<tr><td class='equipo'>".$fila["team"]."</td><td class='nombre'>".$fila["nombre"]."</td><td class='Tarjetas Amarillas Totales'>".$fila["TarjetasAmarillas"]."</td ></tr>";
        }
        // Fin de la tabla HTML
        echo "</table>";};

    //TARJETAS ROJAS
    if (isset($_POST['jornadatr'])){

        //TABLA GENERAL
        $request = $_POST['jornadatr'];
        $conn=mysqli_connect('localhost','root','admin','bd_ed');
        $query ="SELECT equipo as team,(SELECT jugador from jornada where equipo=team and id= '$request' group by jugador,apellidom,apellidop order by sum(tarjetaroja) desc limit 1) as nombre ,(SELECT SUM(tarjetaroja)  from jornada where equipo=team and id= '$request' group by jugador,apellidom,apellidop order by sum(tarjetaroja) desc limit 1) as TarjetasRojas from jornada  group by equipo";
        $result =mysqli_query($conn,$query);
    
        // Comprobar si hay resultados
        // Inicio de la tabla HTML
        echo "<br>";
        echo "<table class='table-bordered text-center d-flex justify-content-center table' >";
        echo "<tr><th width=\"15%\">Equipo</th><th width=\"25%\">Jugador</th><th width=\"25%\">Tarjetas Rojas Totales</th></tr>";
    
        // Recorrido de los resultados de la consulta y colocación de los datos en la tabla HTML
        while($fila = mysqli_fetch_array($result)) {
            echo "<tr><td class='equipo'>".$fila["team"]."</td><td class='nombre'>".$fila["nombre"]."</td><td class='Tarjetas Rojas Totales'>".$fila["TarjetasRojas"]."</td ></tr>";
        }
        // Fin de la tabla HTML
        echo "</table>";};



?>