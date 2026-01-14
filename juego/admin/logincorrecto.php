<?php
require '../connddbb.php';
ini_set('display_errors', 1);

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$captcha = $_POST['resultado_admin'];
$respuestacaptcha = $_POST['resultado_correcto'];
$captcha2 = $_POST['dios_admin'];
$respuestacaptcha2 = $_POST['dios_correcto'];

$comprobarEmail = "SELECT email FROM administradores WHERE email = '$email'";
$comprobarContrasena = "SELECT contrasena FROM administradores WHERE email = '$email'";
$contentEmail = $conexion->prepare($comprobarEmail);
$contentContrasena = $conexion->prepare($comprobarContrasena);
$contentEmail->execute();
$contentContrasena->execute();
$credencialesEmail=$contentEmail->fetchAll(PDO::FETCH_COLUMN);
$credencialesContrasena=$contentContrasena->fetchAll(PDO::FETCH_COLUMN);
$credencialesContrasenaTrue = password_verify($contrasena, $credencialesContrasena[0]);
if($credencialesEmail == null || !$credencialesContrasena){
    header('location:loginAdmin.php?error=login');
}else if ($captcha != $respuestacaptcha || $captcha2 != $respuestacaptcha2) {
    header('location:loginAdmin.php?error=captcha');
}else{
    echo "Login correcto. Bienvenido<br><a href='loginAdmin.php'>Volver al login</a>";
}
?>