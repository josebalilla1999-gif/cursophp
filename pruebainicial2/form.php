<?php
$nombre = '';
$email = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        form{
            padding: 20px;
            background-color: rgba(0,0,0,0.5);
            line-height: 2em;
            color: white;
        }
    </style>
</head>
<body>
    <form id="formulario" name="formulario" action="form.php" method="post">
        <label for="nombre">Nombre:
            <input type="text" id="nombre" name="nombre" required>
        </label><br>
        <label for="email">Email:
            <input type="email" id="email" name="email" required>
        </label><br>
        <input type="submit" id="enviar" value="Enviar datos">
    </form>
    <?php if($nombre != '' && $email != ''):
    ?>
        <p>Te llamas <?= $nombre ?></p>
        <p>Tu correo electronico es <?= $email ?></p>
    <?php endif;
    ?>
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