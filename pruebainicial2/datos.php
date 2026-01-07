<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');

    $errores = [];

    if($nombre === ''){
        array_push($errores, '¿Que no tienes nombre? Po yo te viá llamá cabesa');
    }
    if($email === ''){
        array_push($errores, 'ahorayatienescorreopelotudo@gmail.com');
    }
    if($email !== '' && !str_contains($email, '@')){
        array_push($errores, 'Toma, te olvidaste de esto, pedazo de genio -> @ <-');
    }
    if($email !== '' && !str_contains($email, '.')){
        array_push($errores, 'Toma, te olvidaste de esto, pedazo de genio -> . <-');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <p>Te llamas <?= $nombre ?></p>
    <p>Tu correo electronico es <?= $email ?></p>
    <p><a href="form.php">Regresar al formulario</a></p>
    <p>
    <?php 
    session_start();
    if (isset($_SESSION['usuario'])) {
        echo "Sesión activa: " . $_SESSION['usuario'] . '. <a href="cerrarsesion.php">Cerrar sesion</a>';
    } else {
        echo "No hay sesión iniciada. <a href='sesion.php'>Iniciar sesion</a>";
    }
    ?></p>
</body>
</html>