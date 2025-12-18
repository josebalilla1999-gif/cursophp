<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $anataNoNamaeWa = trim($_POST['nombre']);
        if($anataNoNamaeWa !== ''){
            setcookie('nombre_persona', $anataNoNamaeWa, time() + 60*60*24*1);
            header('location: index.php');
        }
    }
    $nombre = $_COOKIE['nombre_persona'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduccion a las cookies</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php 
    if($nombre){
    ?>
    <h1>Me llena de orgullo y satisfaccion que en estas fechas tan señaladas, podamos reclamar a <?=$nombre?> como nuevo rey de nuestro pais Españita</h1>
    <a href="borrar.php">Borrar nombre</a>
    <?php
    }else{
    ?>
    <form action="index.php" method="POST">
        <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre, o me debes 50€">
        <button type="submit">Guardar nombre</button>
    </form>
    <?php
    }
    ?>
</body>
</html>