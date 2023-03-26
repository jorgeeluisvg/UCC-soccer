<!DOCTYPE html>
<html>
<head>
    <title>Registro de equipos de fútbol</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<!--SELECTS-->
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4 d-flex justify-content-center">
        <a href="index.php"><button id="regresar"  class="btn btn-danger px-2 m-2" >Menu</button></a>
            <!--Equipo1-->
            <select id="equipo" class="d-flex text-center m-2" name="equipo">
                <option>Equipo 1</option>
                <?php
                include("conexion.php");
                //get teams
                $getTeams ="SELECT equipo FROM jornada group by equipo";
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

            <button id="consultar"  class="btn btn-primary px-2 m-2" >Consultar</button>
            <button type="button" name="save" id="save" class="btn btn-warning btn-xs  px-2 m-2">Guardar</button>
        </div>

    </div>
</div>

<!--Tables-->
<div id="table-container">

</div>

<div id="table-container2">

</div>

<script>
    $(document).ready(function()
    {
        $("#consultar").on('click',function()
        {
            var value = $("#equipo").val();
            console.log("Equipo 1 "+value);
            $.ajax(
                {
                    url:'fetch_V2.php',
                    type:'POST',
                    data:'request='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

        });
    });
</script>
</html>
