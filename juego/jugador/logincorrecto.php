<?php

require '../connddbb.php';
ini_set('display_errors', 1);

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$captcha = $_POST['resultado_usuario'];
$respuestacaptcha = $_POST['resultado_correcto'];

$comprobarEmail = "SELECT email FROM usuarios WHERE email = '$email'";
$comprobarContrasena = "SELECT contrasena FROM usuarios WHERE email = '$email'";
$comprobarBaneo = "SELECT baneado FROM usuarios WHERE email = '$email'";

$contentEmail = $conexion->prepare($comprobarEmail);
$contentContrasena = $conexion->prepare($comprobarContrasena);
$contentBan = $conexion->prepare($comprobarBaneo);

$contentEmail->execute();
$contentContrasena->execute();
$contentBan->execute();

$credencialesEmail=$contentEmail->fetchAll(PDO::FETCH_COLUMN);
$credencialesContrasena=$contentContrasena->fetchAll(PDO::FETCH_COLUMN);
$estaBaneado=$contentBan->fetchAll(PDO::FETCH_COLUMN);

$credencialesContrasenaTrue = password_verify($contrasena, $credencialesContrasena[0]);

$comprobarFechaFinBan = "SELECT fechafinban FROM usuarios WHERE email = '$email'";
$contentFechaFinBan = $conexion->prepare($comprobarFechaFinBan);
$contentFechaFinBan->execute();
$fechaFinBan = $contentFechaFinBan->fetchAll(PDO::FETCH_COLUMN);

if($fechaFinBan != null && $fechaFinBan>time()){
    $estaBaneado[0] = 0;
    $cambioBan = "UPDATE usuarios SET baneado = 0, fechafinban = null WHERE email = '$email'";
    $contentCambio = $conexion->prepare($cambioBan);
    $contentCambio->execute();
}

if($credencialesEmail == null || !$credencialesContrasenaTrue){
    header('location: loginJugador.php?error=login');
}else if ($captcha != $respuestacaptcha) {
    header('location:loginJugador.php?error=captcha');
}else if ($estaBaneado[0] == 1) {
    header('location:loginJugador.php?error=baneaditto');
}else{
    echo "Login correcto. Bienvenido<br><a href='loginJugador.php'>Volver al login</a>";
}
?>