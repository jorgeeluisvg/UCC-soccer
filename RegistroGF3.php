<!DOCTYPE html>
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
<body>
    <br><Br>
    <div class="container">
        <br>
        <h2 align="center">Ingresa Las Fichas de Juego</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="tabla">
                <tr>
                    <th width="10%">Jornada</th>
                    <th width="15%">Equipo</th>
                    <th width="25%">Nombre</th>
                    <th width="25%">Apellido Paterno</th>
                    <th width="25%">Apellido Materno</th>
                    <th width="2%">Goles</th>
                    <th width="2%">Faltas</th>
                    <th width="2%">Tarjetas Amarillas</th>
                    <th width="2%">Tarjetas Rojas</th>
                    <th width="2%"></th>
                </tr>
                <tr>
                    <td contenteditable="true" class="jornada"></td>
                    <td contenteditable="true" class="equipo"></td>
                    <td contenteditable="true" class="nombre"></td>
                    <td contenteditable="true" class="apellidop"></td>
                    <td contenteditable="true" class="apellidom"></td>
                    <td contenteditable="true" class="goles"></td>
                    <td contenteditable="true" class="faltas"></td>
                    <td contenteditable="true" class="tarjetasama"></td>
                    <td contenteditable="true" class="tarjetasr"></td>
                    <td></td>
                </tr>
            </table>
            <div align="right">
                <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
            </div>
            <div align="center">
                <button type="button" name="save" id="save" class="btn btn-warning btn-xs">Guardar</button>
            </div>
            <br>
            <div id="insertar_info">

            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function (){
        var count =1;
        $(add).click(function (){
            count = count +1;
            var codigoHtml = "<tr id ='row"+count+"'>";
            codigoHtml += "<td contenteditable='true' class='jornada'></td>";
            codigoHtml += "<td contenteditable='true' class='equipo'></td>";
            codigoHtml += "<td contenteditable='true' class='nombre'></td>";
            codigoHtml += "<td contenteditable='true' class='apellidop'></td>";
            codigoHtml += "<td contenteditable='true' class='apellidom'/td>";
            codigoHtml += "<td contenteditable='true' class='goles'></td>";
            codigoHtml += "<td contenteditable='true' class='faltas'></td>";
            codigoHtml += "<td contenteditable='true' class='tarjetasama'></td>";
            codigoHtml += "<td contenteditable='true' class='tarjetasr'></td>";
            codigoHtml += "<td><button type='button' name='remove' data-row='row"+count+"'class='btn btn-danger btn-xs remove'>-</button><td>";
            codigoHtml += "</tr>";
            $(tabla).append(codigoHtml);
        });
        $(document).on('click','.remove',function (){
            var deleteRow = $(this).data("row");
            $('#'+deleteRow).remove();
        });
        $('#save').click(function (){
            var jornada = [];
            var equipo = [];
            var nombre = [];
            var apellidop = [];
            var apellidom = [];
            var goles = [];
            var faltas = [];
            var tarjetasama = [];
            var tarjetasr = [];

            $('.jornada').each(function (){
                jornada.push($(this).text());
            });
            $('.equipo').each(function (){
                equipo.push($(this).text());
            });
            $('.nombre').each(function (){
                nombre.push($(this).text());
            });
            $('.apellidop').each(function (){
                apellidop.push($(this).text());
            });
            $('.apellidom').each(function (){
                apellidom.push($(this).text());
            });
            $('.goles').each(function (){
                goles.push($(this).text());
            });
            $('.faltas').each(function (){
                faltas.push($(this).text());
            });
            $('.tarjetasama').each(function (){
                tarjetasama.push($(this).text());
            });
            $('.tarjetasr').each(function (){
                tarjetasr.push($(this).text());
            });
            $.ajax({
                url:"inserts.php",
                method:"POST",
                data:{jornada:jornada,equipo:equipo,nombre:nombre,apellidop:apellidop,
                apellidom:apellidom,goles:goles,faltas:faltas,tarjetasama:tarjetasama,tarjetasr:tarjetasr},
                success:function (data){
                    $("td[contenteditable='true']").text("");
                    for (var i = 2; i <count; i++) {
                        $('tr#'+i+'').remove();
                    }
                }
            });

        });
    });
</script>
