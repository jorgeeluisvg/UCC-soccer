<?php
$conn=mysqli_connect('localhost','root','admin','bd_ed');

if (isset($_POST["jornada"])){

    $jornada = $_POST["jornada"];
    $equipo = $_POST["equipo"];
    $nombre = $_POST["nombre"];
    $apellidop = $_POST["apellidop"];
    $apellidom = $_POST["apellidom"];
    $goles = $_POST["goles"];
    $faltas = $_POST["faltas"];
    $tarjetasama = $_POST["tarjetasama"];
    $tarjetasr = $_POST["tarjetasr"];
    $query = '';

    for ($count =0; $count<count($jornada); $count++){
        $jornada_clean = mysqli_real_escape_string($conn, $jornada[$count]);
        $equipo_clean = mysqli_real_escape_string($conn, $equipo[$count]);
        $nombre_clean = mysqli_real_escape_string($conn, $nombre[$count]);
        $apellidop_clean = mysqli_real_escape_string($conn, $apellidop[$count]);
        $apellidom_clean = mysqli_real_escape_string($conn, $apellidom[$count]);
        $goles_clean = mysqli_real_escape_string($conn, $goles[$count]);
        $faltas_clean = mysqli_real_escape_string($conn, $faltas[$count]);
        $tarjetasama_clean = mysqli_real_escape_string($conn, $tarjetasama[$count]);
        $tarjetasr_clean = mysqli_real_escape_string($conn, $tarjetasr[$count]);

        if ($jornada_clean != '' && $equipo_clean != '' && $nombre_clean != '' && $apellidop_clean != ''
            && $apellidom_clean != '' && $goles_clean != '' && $faltas_clean != '' && $tarjetasama_clean != '' &&
            $tarjetasr_clean != '')
        {
            $query .='INSERT INTO jornada (id,equipo,jugador,apellidop,apellidom,goles,faltas,tarjetaamarilla,tarjetaroja) VALUES ("'.$jornada_clean.'","'.$equipo_clean.'","'.$nombre_clean.'","'.$apellidop_clean.'","'.$apellidom_clean.'","'.$goles_clean.'","'.$faltas_clean.'","'.$tarjetasama_clean.'","'.$tarjetasr_clean.'");';
        }
    }

    if ($query != ''){
        if (mysqli_multi_query($conn,$query)){
            echo 'inserted';
        }
        else{
            echo 'error';
        }

    }else{
        echo 'all fields required';
    }

}
?>
