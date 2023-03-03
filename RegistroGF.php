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

            <!--Boton-->
            <br>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <a href="RegistroGF2.php"><button onclick='getEquipos()' type="button" class="btn btn-primary m-2">Consultar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function getEquipos(){
        var e = document.getElementById("equipo");
        var valueequipo1 = e.value;

        var i = document.getElementById("equipo2");
        var valueequipo2 = i.value;

        console.log(valueequipo1);
        console.log(valueequipo2)

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "RegistroGF2.php", true)
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("valueequipo1=" + valueequipo1);

    }

</script>
</html>