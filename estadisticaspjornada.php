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
                <a href="estadisticas.php"><button class="btn btn-warning">Tabla General</button></a>
                <button class="btn btn-warning" id="j1">J1</button>
                <button class="btn btn-warning" id="j2">J2</button>
                <button class="btn btn-warning" id="j3">J3</button>
                <button class="btn btn-warning" id="j4">J4</button>
                <button class="btn btn-warning" id="j5">J5</button>
                <button class="btn btn-warning" id="j6">J6</button>
                <button class="btn btn-warning" id="j7">J7</button>
                <button class="btn btn-warning" id="j8">J8</button>
                <button class="btn btn-warning" id="j9">J9</button>
                <button class="btn btn-warning" id="j10">J10</button>
                <button class="btn btn-warning" id="j11">J11</button>
                <button class="btn btn-warning" id="j12">J12</button>
                <!--TABLA-->
                <br>
                <br>
            </div>
        </div>
    </div>

    <h3 class="text-center">TABLAS GENERALES</h3><p></p>
    <div class="container card">
        <table class="table table-bordered table-dark text-center" id="table-container">
            <tr>
                <td>Equipo</td>
                <td>Goles Totales</td>
                <td>Faltas Totales</td>
                <td>Tarjetas Amarillas</td>
                <td>Tarjetas Rojas</td>
            </tr>
        </table>
        <br>
    </div>
    <br>

    <h3 class="text-center">TOP JUGADORES CON MAS TARJETAS AMARILLAS POR EQUIPO</h3><p></p>
    <div class="container card">
        <table class="table table-bordered table-dark text-center" id="table-container2">
            <tr>
                <td>Equipo</td>
                <td>Jugador</td>
                <td>Tarjetas Amarillas</td>
            </tr>
        </table>
        <br>
    </div>

    <h3 class="text-center">TOP JUGADORES CON MAS TARJETAS ROJAS POR EQUIPO</h3><p></p>
    <div class="container card">
        <table class="table table-bordered table-dark text-center" id="table-container3">
            <tr>
                <td>Equipo</td>
                <td>Jugador</td>
                <td>Tarjetas Rojas</td>
            </tr>
        </table>
        <br>
    </div>


</body>
<script>
     $(document).ready(function()
    {
        $("#j1").on('click',function()
        {
            var value = 1;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j2").on('click',function()
        {
            var value = 2;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j3").on('click',function()
        {
            var value = 3;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });                

        });

        $("#j4").on('click',function()
        {
            var value = 4;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j5").on('click',function()
        {
            var value = 5;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j6").on('click',function()
        {
            var value = 6;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j7").on('click',function()
        {
            var value = 7;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j8").on('click',function()
        {
            var value = 8;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j9").on('click',function()
        {
            var value = 9;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j10").on('click',function()
        {
            var value = 10;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j11").on('click',function()
        {
            var value = 11;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });

        $("#j12").on('click',function()
        {
            var value = 12;
            console.log("Valor jornada "+value);
            $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornada='+value,
                    beforeSend:function ()
                    {
                        $("#table-container").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container").html(data);
                    },
                });

                //AJAX T AMARILLAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadata='+value,
                    beforeSend:function ()
                    {
                        $("#table-container2").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container2").html(data);
                    },
                });

                //AJAX T ROJAS
                $.ajax(
                {
                    url:'fetch_Jornada.php',
                    type:'POST',
                    data:'jornadatr='+value,
                    beforeSend:function ()
                    {
                        $("#table-container3").html('Working');
                    },
                    success:function (data)
                    {
                        $("#table-container3").html(data);
                    },
                });

        });


    });

</script>

</html>
