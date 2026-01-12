<?php

$host = "localhost";
$db   = "usuario";
$user = "root";
$pass = "root";

try {
    $conexion = new PDO(
        "mysql:host=$host;dbname=$db;",
        $user,
        $pass
    );
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión";
    exit;
}

$nombre     = $_POST['nombre'];
$apellidos  = $_POST['apellidos'];
$email      = $_POST['email'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$rol        = $_POST['rol'];

$sql = "INSERT INTO administradores 
        (nombre, apellidos, email, contrasena, rol)
        VALUES (:nombre, :apellidos, :email, :contrasena, :rol)";

$stmt = $conexion->prepare($sql);
$stmt->execute([
    ':nombre'     => $nombre,
    ':apellidos'  => $apellidos,
    ':email'      => $email,
    ':contrasena' => $contrasena,
    ':rol'        => $rol
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
</body>
</html>