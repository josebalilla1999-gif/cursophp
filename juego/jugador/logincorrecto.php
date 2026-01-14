<?php

require '../connddbb.php';
ini_set('display_errors', 1);

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$captcha = $_POST['resultado_usuario'];
$respuestacaptcha = $_POST['resultado_correcto'];

$comprobarEmail = "SELECT email FROM usuarios WHERE email = '$email'";
$comprobarContrasena = "SELECT contrasena FROM usuarios WHERE email = '$email'";
$contentEmail = $conexion->prepare($comprobarEmail);
$contentContrasena = $conexion->prepare($comprobarContrasena);
$contentEmail->execute();
$contentContrasena->execute();
$credencialesEmail=$contentEmail->fetchAll(PDO::FETCH_COLUMN);
$credencialesContrasena=$contentContrasena->fetchAll(PDO::FETCH_COLUMN);
$credencialesContrasenaTrue = password_verify($contrasena, $credencialesContrasena[0]);
if($credencialesEmail == null || !$credencialesContrasenaTrue){
    header('location: loginJugador.php?error=login');
}else if ($captcha != $respuestacaptcha) {
    header('location:loginJugador.php?error=captcha');
}else{
    echo "Login correcto. Bienvenido<br><a href='loginJugador.php'>Volver al login</a>";
}
?>