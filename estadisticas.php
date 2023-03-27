<?php
$conn=mysqli_connect('localhost','root','admin','bd_ed');
?>


<!DOCTYPE html>
<html>
<head>
    <title>Estadisticas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="script.js"></script>

    <style>
        body{
            background: #3c9dc7;
            background: linear-gradient(to right, #62a2bd,#3c9dc7);
        }
    </style>
</head>
<body>
    <h1 class="text-center">
        E S T A D I S T I C A S
    </h1>

    <div class="container-md text-center">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
            <a href="index.php"><button class="btn btn-success">Menu</button></a>
            </div>
        </div>
    </div>


    <div class="container-md text-center">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 py-2">
                <button class="btn btn-warning">Tabla General</button>
                <a href="estadisticaspjornada.php"><button class="btn btn-warning">Tabla Por Jornadas</button></a>
              
                <!--TABLA-->
                <br>
                <br>
            </div>
        </div>
    </div>

    <div class="container card">
        <table class="table table-bordered table-dark text-center">
            <tr>
                <td>Equipo</td>
                <td>Goles Totales</td>
                <td>Faltas Totales</td>
                <td>Tarjetas Amarillas</td>
                <td>Tarjetas Rojas</td>
            </tr>

            <h3 class="text-center">TABLAS GENERALES</h3><p></p>
            <?php
                $sql = "SELECT equipo,SUM(goles) AS 'GOLES TOTALES',sum(faltas) AS 'FALTAS TOTALES',SUM(tarjetaamarilla) AS 'TARJETAS AMARILLAS',SUM(tarjetaroja) AS 'TARJETAS ROJAS' FROM jornada GROUP BY equipo";
                $result = mysqli_query($conn,$sql);
                while($mostrar= mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $mostrar['equipo'] ?></td>
                <td><?php echo $mostrar['GOLES TOTALES'] ?></td>
                <td><?php echo $mostrar['FALTAS TOTALES'] ?></td>
                <td><?php echo $mostrar['TARJETAS AMARILLAS'] ?></td>
                <td><?php echo $mostrar['TARJETAS ROJAS'] ?></td>
            </tr>
            <?php
            }
            ?>
        </table>


    <br>

        <table class="table table-bordered table-dark text-center">
            <tr>
                <td>Equipo</td>
                <td>Jugador</td>
                <td>Tarjetas Amarillas</td>
            </tr>

            <h3 class="text-center">TOP JUGADORES CON MAS TARJETAS AMARILLAS POR EQUIPO</h3><p></p>
            <?php
            $sql = "select equipo as team,(SELECT jugador from jornada where equipo=team group by jugador,apellidom,apellidop order by sum(tarjetaamarilla) desc limit 1) as nombre ,(SELECT SUM(tarjetaamarilla)  from jornada where equipo=team group by jugador,apellidom,apellidop order by sum(tarjetaamarilla) desc limit 1) as TarjetasAmarillas from jornada group by equipo";
            $result = mysqli_query($conn,$sql);
            while($mostrar= mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['team'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['TarjetasAmarillas'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <br>

        <table class="table table-bordered table-dark text-center">
            <tr>
                <td>Equipo</td>
                <td>Jugador</td>
                <td>Tarjetas Rojas</td>
            </tr>

            <h3 class="text-center">TOP JUGADORES CON MAS TARJETAS ROJAS POR EQUIPO</h3><p></p>
            <?php
            $sql = "select equipo as team,(SELECT jugador from jornada where equipo=team group by jugador,apellidom,apellidop order by sum(tarjetaroja) desc limit 1) as nombre ,(SELECT SUM(tarjetaroja)  from jornada where equipo=team group by jugador,apellidom,apellidop order by sum(tarjetaroja) desc limit 1) as TarjetasRojas from jornada group by equipo";
            $result = mysqli_query($conn,$sql);
            while($mostrar= mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['team'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['TarjetasRojas'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <br>

        <table class="table table-bordered table-dark text-center">
            <tr>
                <td>Equipo</td>
                <td>Jugador</td>
                <td>Faltas</td>
            </tr>

            <h3 class="text-center bg-info text-white">TOP 10 JUGADORES CON MAS FALTAS</h3><p></p>
            <?php
            $sql = "SELECT equipo as team,jugador as nombre, SUM(faltas) as Faltas from jornada group by jugador,apellidom,apellidop,equipo order by sum(faltas) desc limit 10";
            $result = mysqli_query($conn,$sql);
            while($mostrar= mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['team'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['Faltas'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <br>

        <table class="table table-bordered table-dark text-center">
            <tr>
                <td>Equipo</td>
                <td>Jugador</td>
                <td>Tarjetas Amarillas</td>
            </tr>

            <h3 class="text-center bg-warning">TOP 10 JUGADORES CON MAS TARJETAS AMARILLAS</h3><p></p>
            <?php
            $sql = "SELECT equipo as team,jugador as nombre, SUM(tarjetaamarilla) as tarjetaamarilla from jornada group by jugador,apellidom,apellidop,equipo order by sum(tarjetaamarilla) desc limit 10";
            $result = mysqli_query($conn,$sql);
            while($mostrar= mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['team'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['tarjetaamarilla'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <br>

        <table class="table table-bordered table-dark text-center">
            <tr>
                <td>Equipo</td>
                <td>Jugador</td>
                <td>Tarjetas Rojas</td>
            </tr>

            <h3 class="text-center bg-danger text-white">TOP 10 JUGADORES CON MAS TARJETAS ROJAS</h3><p></p>
            <?php
            $sql = "SELECT equipo as team,jugador as nombre, SUM(tarjetaroja) as TarjetasRojas from jornada group by jugador,apellidom,apellidop,equipo order by sum(tarjetaroja) desc limit 10";
            $result = mysqli_query($conn,$sql);
            while($mostrar= mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['team'] ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['TarjetasRojas'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>


</body>
<?php
?>
