<?php
require_once 'inc/mitema.php';
$app = new Mitema();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $color = $_POST['colores'];
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegir tema</title>
</head>
<body>
    <!-- <form action="index.php" method="POST">
        <label for="coloresfondo">Cambio de color de fondo:
        <select name="coloresfondo" id="coloresfondo">
            <option value="white" selected disabled>-- Selecciona un color --</option>
            <option value="orange">Naranja</option>
            <option value="red">Rojo</option>
            <option value="white">Blanco</option>
            <option value="black">Negro</option>
            <option value="green">Verde</option>
            <option value="lightblue">Azul claro</option>
            <option value="blue">Azul oscuro</option>
            <option value="grey">Gris</option>
        </select></label> -->
        <!-- <p>Este es una letra con un color estandar</p> -->
        <!-- <label for="coloresletra">Cambio de color de letra:
        <select name="coloresletra" id="coloresletra">
            <option value="white" selected disabled>-- Selecciona un color --</option>
            <option value="orange">Naranja</option>
            <option value="red">Rojo</option>
            <option value="white">Blanco</option>
            <option value="black">Negro</option>
            <option value="green">Verde</option>
            <option value="lightblue">Azul claro</option>
            <option value="blue">Azul oscuro</option>
            <option value="grey">Gris</option>
        </select></label>
    </form> -->
    <?php
        $app->__escribirJS();
    ?>
</body>
</html>
