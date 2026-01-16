<?php

require '../connddbb.php';
ini_set('display_errors', 1);

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$contrasena = password_hash($_POST['contrasena'], CRYPT_SHA256);
$nick = $_POST['nick'] ?? null;
$fechaNac = strtotime($_POST['fechaNac']) ?? null;
$fechaAlta = time();

$correoComprobar = "SELECT email FROM usuarios WHERE email = '$email'";
$nickComprobar = "SELECT nick FROM usuarios WHERE nick = '$nick'";
$contentCorreo = $conexion->prepare($correoComprobar);
$contentCorreo->execute();
$contentNick = $conexion->prepare(query: $nickComprobar);
$contentNick->execute();
$correo = $contentCorreo->fetchAll(PDO::FETCH_COLUMN);
$nickname = $contentNick->fetchAll(PDO::FETCH_COLUMN);
if ($correo!=null) {
    header('location:formJugador.php?error=correo');
}else if($nickname!=null){
    header('location:formJugador.php?error=nick');
}else{
    $sql = "INSERT INTO usuarios 
        (nombre, apellidos, email, contrasena, nick, terminos, fechanacimiento, fechaAlta, baneado, numerointentosfallidos)
        VALUES (:nombre, :apellidos, :email, :contrasena, :nick, 1, :fechaNac, :fechaAlta, 0, 0)";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':apellidos' => $apellidos,
        ':email' => $email,
        ':contrasena' => $contrasena,
        ':nick' => $nick,
        ':fechaNac' => $fechaNac,
        ':fechaAlta' => $fechaAlta
    ]);
    header('location: loginJugador.php');
}
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