<?php
require 'connddbb.php';
ini_set('display_errors', 1);

$id = $_POST['id'];
$nick = $_POST['nick'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$baneado = $_POST['baneado'];
$banear = $_POST['banear'] ?? 'no';
$desbanear = $_POST['desbanear'] ?? 'no';
$fechafinban = $_POST['fechafinban'] ?? null;
$dardebaja = $_POST['dardebaja'] ?? 'no';
$recuperar = $_POST['recuperar'] ?? 'no';
$fechabaja = $_POST['fechabaja'] ?? null;

if ($dardebaja == 'si') {
    $fechabaja = time();
}
if ($recuperar == 'si') {
    $fechabaja = null;
}
if ($desbanear == 'si') {
    $baneado = 0;
    $fechafinban = null;
}
if ($banear == 'si') {
    $baneado = 1;
}
if ($banear == 'si' && ($fechafinban == null || strtotime($fechafinban) < time())) {
    $baneado = 0;
}
$sql = "
UPDATE usuarios SET
    nombre = :nombre,
    apellidos = :apellidos,
    nick = :nick,
    baneado = :baneado,
    fechafinban = :fechafinban,
    fechabaja = :fechabaja
WHERE id = :id
";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ':nombre' => $nombre,
    ':apellidos' => $apellidos,
    ':nick' => $nick,
    ':baneado' => $baneado,
    ':fechafinban' => $fechafinban ? strtotime($fechafinban) : null,
    ':fechabaja' => $fechabaja ?? null,
    ':id' => $id
]);
header('location:listaJugadores.php');
?>