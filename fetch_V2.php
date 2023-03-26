<?php
if (isset($_POST['request'])){
    $request = $_POST['request'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="SELECT * FROM jornada where equipo ='$request' group by jugador,apellidop,apellidom";
    $result =mysqli_query($conn,$query);


    // Comprobar si hay resultados
    // Inicio de la tabla HTML
    echo "<br>";
    echo "<table class='table-bordered text-center d-flex justify-content-center table' >";
    echo "<tr><th width=\"10%\">Jornada</th><th width=\"15%\">Equipo</th><th width=\"25%\">Nombre</th><th width=\"25%\">Apellido Paterno</th><th width=\"25%\">Apellido Materno</th><th width=\"2%\">Goles</th><th width=\"2%\">Faltas</th><th width=\"2%\">Tarjetas Amarillas</th><th width=\"2%\">Tarjetas Rojas</th></tr>";

    // Recorrido de los resultados de la consulta y colocación de los datos en la tabla HTML
    while($fila = mysqli_fetch_array($result)) {
        echo "<tr><td contenteditable='true' class='jornada'></td><td class='equipo'>".$fila["equipo"]."</td><td class='nombre'>".$fila["jugador"]."</td><td class='apellidop'>".$fila["apellidop"]."</td ><td class='apellidom'>".$fila["apellidom"]."</td><td contenteditable='true' class='goles'></td><td contenteditable='true' class='faltas'></td><td contenteditable='true' class='tarjetasama'></td><td contenteditable='true' class='tarjetasr'></td></tr>";
    }
    // Fin de la tabla HTML
    echo "</table>";};

if (isset($_POST['request2'])){
    $request2 = $_POST['request2'];
    $conn=mysqli_connect('localhost','root','admin','bd_ed');
    $query ="SELECT * FROM jornada where equipo ='$request2' group by jugador,apellidop,apellidom";
    $result =mysqli_query($conn,$query);

    //tabla equipo 2
    echo "<br><br><br>";
    echo "<table class='table-bordered text-center d-flex justify-content-center table'>";
    echo "<tr><th width=\"10%\">Jornada</th><th width=\"15%\">Equipo</th><th width=\"25%\">Nombre</th><th width=\"25%\">Apellido Paterno</th><th width=\"25%\">Apellido Materno</th><th width=\"2%\">Goles</th><th width=\"2%\">Faltas</th><th width=\"2%\">Tarjetas Amarillas</th><th width=\"2%\">Tarjetas Rojas</th></tr>";

    while($fila = mysqli_fetch_array($result)) {
        echo "<tr><td contenteditable='true' class='jornada'></td><td class='equipo'>".$fila["equipo"]."</td><td class='nombre'>".$fila["jugador"]."</td><td class='apellidop'>".$fila["apellidop"]."</td ><td class='apellidom'>".$fila["apellidom"]."</td><td contenteditable='true' class='goles'></td><td contenteditable='true' class='faltas'></td><td contenteditable='true' class='tarjetasama'></td><td contenteditable='true' class='tarjetasr'></td></tr>";
    }
    echo "</table>";
    mysqli_close($conn);
};
echo "<script>$('#save').click(function (){var jornada = [];var equipo = [];var nombre = [];var apellidop = [];var apellidom = [];var goles = [];var faltas = [];var tarjetasama = [];var tarjetasr = [];$('.jornada').each(function (){jornada.push($(this).text());});$('.equipo').each(function (){equipo.push($(this).text());});$('.nombre').each(function (){nombre.push($(this).text());});$('.apellidop').each(function (){apellidop.push($(this).text());});$('.apellidom').each(function (){apellidom.push($(this).text());});$('.goles').each(function (){goles.push($(this).text());});$('.faltas').each(function (){faltas.push($(this).text());});$('.tarjetasama').each(function (){tarjetasama.push($(this).text());});$('.tarjetasr').each(function (){tarjetasr.push($(this).text());});$.ajax({url:\"inserts_V2.php\",method:\"POST\",data:{jornada:jornada,equipo:equipo,nombre:nombre,apellidop:apellidop,apellidom:apellidom,goles:goles,faltas:faltas,tarjetasama:tarjetasama,tarjetasr:tarjetasr},success:function (data){ $(\"td[contenteditable='true']\").text(\"\");}});});</script>";


?>
