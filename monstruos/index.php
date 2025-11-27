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
        echo '<header><h1>Mis monstruos favoritos</h1></header><main><ul id= "criaturas">';
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
            $monstruo['nombre'] . '"></figure>' . 
            '<form action="inc/monstruo-detalle.php" method="post">' . 
            '<input type="hidden" value="' . $monstruo['nombre'] . '" name="nombre">' . 
            '<input type="hidden" value="' . $monstruo['descripcion'] . '" name="descripcion">' . 
            '<input type="hidden" value="' . $monstruo['ubicacion'] . '" name="ubicacion">' . 
            '<input type="hidden" value="' . $monstruo['imagen'] . '" name="imagen">' . 
            '<input type="hidden" value="' . $monstruo['origen']['fuente'] . '" name="fuente">' . 
            '<input type="hidden" value="' . $monstruo['origen']['autor'] . '" name="autor">' . 
            '<input type="hidden" value="' . $monstruo['origen']['anio'] . '" name="anio">' . 
            '<button>Ver detalle</button></form></li>';
        }
        echo '</ul></main>';
    ?>
</body>
</html>

