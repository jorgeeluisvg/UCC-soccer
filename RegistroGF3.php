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
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="script.js"></script>
</head>
</html>
<!--SELECTS-->
<div id="invoice"  class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4 d-flex justify-content-center">
            <!--Equipo1-->
            <select id="equipo" class="d-flex text-center m-2" name="equipo">
                <option>Equipo 1</option>
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
                    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
                    <script src="script.js"></script>
                </head>  <?php
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
            <select id="equipo2" class="text-center m-2" name="equipo2">
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
            <button id="consultar"  class="btn btn-primary px-2 m-2" >Consultar</button>
            <button onclick="generarPDF()" id="descargar"  class="btn btn-primary px-2 m-2" >Descargar</button>
            <button onclick="registrar()" id="registrar" class="btn btn-primary m-2">Registrar Partido</button>
        </div>
    </div>

    <div id="table-container">

    </div>

    <div id="table-container2">

    </div>
</div>

<!--Tables-->


<script>
    $(document).ready(function()
    {
        $("#consultar").on('click',function()
        {
            var value = $("#equipo").val();
            var value2 = $("#equipo2").val();
            console.log("Equipo 1 "+value);
            console.log("Equipo2 "+value2);
            $.ajax(
                {
                    url:'fetch.php',
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

            $.ajax(
                {
                    url:'fetch.php',
                    type:'POST',
                    data:'request2='+value2,
                    beforeSend:function()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });
        });
    });
</script>

<script>
    function registrar(){
    }
</script>
</html>
