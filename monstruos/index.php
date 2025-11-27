<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis monstruos favoritos</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php 
        require_once 'inc/monstruos.php';
        echo '<h1>Mis monstruos favoritos</h1>';
        echo '<ul id= "criaturas">';
        foreach($monstruos as $monstruo){
            // echo '<h2>' . $monstruo['nombre'] . '</h2>';
            // echo '<ul id="criaturas">';
            // echo '<li><strong>Origen</strong>:';
            // echo '<ul>';
            // echo '<li>' . $monstruo['origen']['fuente'] . '</li>';
            // echo '<li>' . $monstruo['origen']['autor'] . '</li>';
            // echo '<li>' . $monstruo['origen']['anio'] . '</li>';
            // echo '</ul>';
            // echo '<li>' . $monstruo['descripcion'] . '</li>';
            // echo '<li><strong>Lugar de origen</strong>: ' . $monstruo['ubicacion'] . '</li>';
            // echo '<li><figure><img src="img/' . $monstruo['imagen'] . '" alt="Imagen de la criatura diabolica ' . $monstruo['nombre'] . '"></figure></li>';
            // echo '</ul>';
            echo '<li>' . 
            '<h2>' . $monstruo['nombre'] . '</h2>' . '<figure><img src="img/' .
            $monstruo['imagen'] . '" alt="Imagen de la criatura diabolica ' .
            $monstruo['nombre'] . '"></figure><p>' . $monstruo['descripcion'] . '</p><p><strong>Lugar de origen</strong>: ' . 
            $monstruo['ubicacion'] . '</p></li>';
        }
        echo '</ul>';
    ?>
</body>
</html>

