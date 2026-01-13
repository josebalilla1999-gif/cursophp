<?php

require '../connddbb.php';

$nombre     = $_POST['nombre'];
$apellidos  = $_POST['apellidos'];
$email      = $_POST['email'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$nick       = $_POST['nick'] ?? null;
$fechaNac   = strtotime($_POST['fechaNac']) ?? null;
$fechaAlta  = time();

$sql = "INSERT INTO usuarios 
        (nombre, apellidos, email, contrasena, nick, terminos, fechanacimiento, fechaAlta, baneado)
        VALUES (:nombre, :apellidos, :email, :contrasena, :nick, 1, :fechaNac, :fechaAlta, 0)";

$stmt = $conexion->prepare($sql);
$stmt->execute([
    ':nombre'     => $nombre,
    ':apellidos'  => $apellidos,
    ':email'      => $email,
    ':contrasena' => $contrasena,
    ':nick'       => $nick,
    ':fechaNac'   => $fechaNac,
    ':fechaAlta'  => $fechaAlta
]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
    <p>Los datos han sido verificados con exito</p>
    <a href="loginJugador.php">Log in</a>
</body>
</html>