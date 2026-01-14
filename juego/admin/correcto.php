<?php

require '../connddbb.php';

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$contrasena = password_hash($_POST['contrasena'], CRYPT_SHA256);
$rol = $_POST['rol'];

$correoComprobar = "SELECT email FROM administradores WHERE email = '$email'";
$contentCorreo = $conexion->prepare($correoComprobar);
$contentCorreo->execute();
$correo = $contentCorreo->fetchAll(PDO::FETCH_COLUMN);
if ($correo!=null) {
    header('location:formAdmin.php?error=correo');
}else{
    $sql = "INSERT INTO administradores 
        (nombre, apellidos, email, contrasena, rol)
        VALUES (:nombre, :apellidos, :email, :contrasena, :rol)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':apellidos' => $apellidos,
        ':email' => $email,
        ':contrasena' => $contrasena,
        ':rol' => $rol
    ]);
    header('location: loginAdmin.php');
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
</body>
</html>