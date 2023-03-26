<!DOCTYPE html>
<html>
<head>
    <title>Crear tabla dinámicamente con PHP</title>
</head>
<body>
<form method="post">
    <label for="filas">Número de filas:</label>
    <input type="number" name="filas" id="filas" min="1" required>
    <input type="submit" name="crear_tabla" value="Crear tabla">
</form>

<?php
if (isset($_POST['crear_tabla'])) {
    $num_filas = $_POST['filas'];

    // Crear la tabla HTML con el número de filas especificado
    echo '<table>';
    for ($i = 1; $i <= $num_filas; $i++) {
        echo '<tr>';
        echo '<td><input type="text" name="campo_'.$i.'_1"></td>';
        echo '<td><input type="text" name="campo_'.$i.'_2"></td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
</body>
</html>
