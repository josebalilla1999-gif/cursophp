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

$comprobarFechaBaja = "SELECT fechabaja FROM usuarios WHERE email = '$email'";
$contentFechaBaja = $conexion->prepare($comprobarFechaBaja);
$contentFechaBaja->execute();
$fechaBaja = $contentFechaBaja->fetch(PDO::FETCH_COLUMN);
$estaDeBaja = 0;

if($fechaBaja != null){
    $estaDeBaja = 1;
}

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

if($estaDeBaja!=0){
    header('location:loginJugador.php?error=baja');
    exit;
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
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../static/css/style.css">
    </head>
    <body>
        <p>Login correcto. Bienvenido<br><a href='loginJugador.php'>Volver al login</a></p>
        <p>Y saco un papelillo<br>
            Me preparo un cigarrillo<br>
            Y una china pal canuto de hachis<br>
            HACHIS<br>
            Saca ya la china, tron<br>
            Venga ya esa china, tron<br>
            Quemame la china, tron<br>
            NO HAY CHINAS<br>
            Y saco un papelillo<br>
            Me preparo un cigarrillo<br>
            Y una china pal canuto de hachis<br>
            HACHIS<br>
            Saca ya la china, tron<br>
            Venga ya esa china, tron<br>
            Quemame la china, tron<br>
            NO HAY CHINAS<br>
            NO HAY CHINAS HOOOOOY<br>
            NO HAY CHINAS HOY<br>
            Lega-legalizacion (CANNABIS)<br>
            De calidad y barato<br>
            Lega-legalizacion (CANNABIS)<br>
            Basta de prohibicion<br>
            Lega-legalizacion (CANNABIS)<br>
            De calidad y barato<br>
            Lega-legalizacion (CANNABIS)<br>
            Basta de prohibicion<br></p>
    </body>
    </html>
        <?
    }
}
?>