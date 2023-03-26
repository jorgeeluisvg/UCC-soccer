<?php
include("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Obtener el nombre de usuario y la contraseña del formulario
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Consulta para verificar si las credenciales son válidas
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Si se encuentra un registro en la tabla de usuarios con las credenciales proporcionadas, iniciar sesión y redirigir al usuario
    if(mysqli_num_rows($result) == 1){
        session_start();
        $_SESSION['username'] = $usuario;
        header("location: RegistroJugador.php");
    } else {
        // Si las credenciales son incorrectas, mostrar un mensaje de error
        $error = "Nombre de usuario o contraseña incorrecta.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>App Control Eventos Deportivos</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-primary p-2 text-white bg-opacity-75">
<!--Form-->
<div class="col-md-3 position-absolute top-50 start-50 translate-middle text-center bg-white rounded shadow">
    <form method="POST">
        <!--Imagen-->
        <div class="col-md-14 d-flex align-items-center justify-content-center">
            <img src="logo.png" alt="Universidad Cristobal Colon">
        </div>

        <div class="mb-3">
            <a href="login.php" class="btn btn-primary" role="button">Registro Equipos<br>Jugadores</a>
        </div>
        <br>
        <div class="mb-3">
            <a href="RegistroGF3_V2.php" class="btn btn-primary" role="button">Registro Juegos</a>
        </div>
        <br>
        <div class="mb-3">
            <a href="estadisticas.php" class="btn btn-primary" role="button">Estadisticas</a>
        </div>

        <br>

    </form>
</div>

</div>

</body>
</html>
