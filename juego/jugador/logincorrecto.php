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
$comprobarIntentos = "SELECT numerointentosfallidos FROM usuarios WHERE email = '$email'";

$contentEmail = $conexion->prepare($comprobarEmail);
$contentContrasena = $conexion->prepare($comprobarContrasena);
$contentBan = $conexion->prepare($comprobarBaneo);
$contentIntentos = $conexion->prepare($comprobarIntentos);

$contentEmail->execute();
$contentContrasena->execute();
$contentBan->execute();
$contentIntentos->execute();

$credencialesEmail=$contentEmail->fetch(PDO::FETCH_COLUMN);
$credencialesContrasena=$contentContrasena->fetch(PDO::FETCH_COLUMN);
$estaBaneado=$contentBan->fetch(PDO::FETCH_COLUMN);
$numeroIntentos=$contentIntentos->fetch(PDO::FETCH_COLUMN);
$credencialesContrasenaTrue = password_verify($contrasena, $credencialesContrasena);

$comprobarFechaFinBan = "SELECT fechafinban FROM usuarios WHERE email = '$email'";
$contentFechaFinBan = $conexion->prepare($comprobarFechaFinBan);
$contentFechaFinBan->execute();
$fechaFinBan = $contentFechaFinBan->fetch(PDO::FETCH_COLUMN);

$comprobarFechaFinBloqueo = "SELECT fechafinbloqueologin FROM usuarios WHERE email = '$email'";
$contentFechaFinBloqueo = $conexion->prepare($comprobarFechaFinBloqueo);
$contentFechaFinBloqueo->execute();
$fechaFinBloqueo = $contentFechaFinBloqueo->fetch(PDO::FETCH_COLUMN);

if($fechaFinBan != null && $fechaFinBan<=time()){
    $estaBaneado = 0;
    $cambioBan = "UPDATE usuarios SET baneado = 0, fechafinban = null WHERE email = '$email'";
    $contentCambio = $conexion->prepare($cambioBan);
    $contentCambio->execute();
}

if($fechaFinBloqueo != null && $fechaFinBloqueo<=time()){
    $cambioBloqueo = "UPDATE usuarios SET fechafinbloqueologin = null WHERE email = '$email'";
    $contentCambioBloq = $conexion->prepare($cambioBloqueo);
    $contentCambioBloq->execute();
}

if ($estaBaneado!=0) {
    header('location:loginJugador.php?error=baneaditto');
}else if($numeroIntentos>=4){
    $numeroIntentos = 0;
    $setNumeroIntentos = "UPDATE usuarios SET numerointentosfallidos = " . $numeroIntentos . ", baneado = 1, fechafinban = " . time()+3600 . ", fechafinbloqueologin = " . time()+3600 . " WHERE email = '$email'";
    $prepNumeroIntentos = $conexion->prepare($setNumeroIntentos);
    $prepNumeroIntentos->execute();
    header('location:loginJugador.php?error=intentos');
}else{
    if($credencialesEmail == null || !$credencialesContrasenaTrue){
        $numeroIntentos = $numeroIntentos+1;
        $setNumeroIntentos = "UPDATE usuarios SET numerointentosfallidos = " . $numeroIntentos . " WHERE email = '$email'";
        $prepNumeroIntentos = $conexion->prepare($setNumeroIntentos);
        $prepNumeroIntentos->execute();
        header('location:loginJugador.php?error=login');
    }else if ($captcha != $respuestacaptcha) {
        $numeroIntentos = $numeroIntentos+1;
        $setNumeroIntentos = "UPDATE usuarios SET numerointentosfallidos = " . $numeroIntentos . " WHERE email = '$email'";
        $prepNumeroIntentos = $conexion->prepare($setNumeroIntentos);
        $prepNumeroIntentos->execute();
        header('location:loginJugador.php?error=captcha');
    }else{
        $setNumeroIntentos = "UPDATE usuarios SET numerointentosfallidos = " . 0 . " WHERE email = '$email'";
        $prepNumeroIntentos = $conexion->prepare($setNumeroIntentos);
        $prepNumeroIntentos->execute();
        echo "Login correcto. Bienvenido<br><a href='loginJugador.php'>Volver al login</a>";
    }
}
?>