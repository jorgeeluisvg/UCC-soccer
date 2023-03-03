<?php
//session
// Verificar si la sesión está iniciada
session_start();
if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['usuario'])) {
    // La sesión está iniciada
    echo "La sesión está iniciada para el usuario: " . $_SESSION['usuario'];
} else {
    // La sesión no está iniciada
    header("location: login.php");
}

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "bd_ed";

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificación de conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtención y comprobacion de los datos de los formularios
if (isset($_POST['equipo']) && isset($_POST['liga'])) {
        $equipo = $_POST["equipo"];
        $liga = $_POST["liga"];

    // Inserción de los datos en la tabla correspondiente de la base de datos
    $sql = "INSERT INTO registroequipos (equipo, liga) (select '$equipo','$liga' where '$equipo' not in (select equipo from registroequipos group by equipo))";

    if (mysqli_query($conn, $sql)) {
        echo "Datos guardados correctamente en la base de datos";
    } else {
        echo "Error al guardar los datos: " . mysqli_error($conn);
    }

// Cierre de la conexión a la base de datos
    mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de equipos de fútbol</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <style>
        body{
            background: #3c9dc7;
            background: linear-gradient(to right, #62a2bd,#3c9dc7);
        }

        .bg{
            background-image: url("logo.jpg");
            background-position: center center;
            height: auto;
            background-size: contain;

        }
    </style>
</head>

<body>
<div class="container w-75 bg-secondary mt-5 rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>

        <!--Logo-->
        <div class="col bg-white p-1 rounded-end">
            <div class="text-end">
                <a href="index.php"><img src="logo.png" alt="Universidad Cristobal Colon" width="48px"></a>
            </div>

            <h2 class="fw-bold text-center py-5 mb-5">Registro Equipos</h2>
            <!--Login-->
            <form action="#" method="POST">

                <div class="form-group text-center">
                    <label for="liga">Selecciona Liga:</label>
                    <select class="form-control text-center" id="liga" name="liga">
                        <option value="ascenso">Ascenso</option>
                        <option value="premier">Premier</option>
                    </select>
                </div>

                <div class="mb-4 text-center">
                    <label for="equipo" class="form-label">Nombre Equipo</label>
                    <input type="text" class="form-control" id="equipo" name="equipo" required>
                </div>
                <br>
                <!--Boton-->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
                <br>
                <div class="d-grid">
                    <a href="RegistroJugador.php" class="btn btn-danger" role="button">Registrar Jugador</a>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>
