<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('location:index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos</title>
</head>
<body>
    <p>Hola <?= $_SESSION['usuario']?></p>
    <a href="#">Cerrar sesion</a>
</body>
</html>