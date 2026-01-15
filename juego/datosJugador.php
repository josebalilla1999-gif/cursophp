<?php
    require 'connddbb.php';
    ini_set('display_errors', 1);

    $id = $_GET['id'];
    $sql = "SELECT id, nick, nombre, apellidos, email, fechanacimiento, fechaalta, baneado, fechafinban, fechabaja FROM usuarios WHERE id = '$id'";
    $usuario = $conexion->prepare($sql);
    $usuario->execute();
    $dato = $usuario->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de jugador</title>
</head>
<body>
    <header>
        <h1>Datos de jugador</h1>
    </header>
    <main id="datos">
        <p>Id: <input type="text" id="id" name="id" value="<?= $dato['id'] ?>"></p>
        <p>Nick: <input type="text" id="nick" name="nick" value="<?= $dato['nick'] ?>"></p>
        <p>Nombre: <input type="text" id="nombre" name="nombre" value="<?= $dato['nombre'] ?>"></p>
        <p>Apellidos: <input type="text" id="apellidos" name="apellidos" value="<?= $dato['apellidos'] ?>"></p>
        <p>Email: <?= $dato['email'] ?></p>
        <p>Fecha de nacimiento: <?= date("d/m/Y", $dato['fechanacimiento']) ?></p>
        <p>Fecha de alta: <?= date("d/m/Y", $dato['fechaalta']) ?></p>
        <?php if($dato['baneado'] == 0):?>
            <p>¿Baneado?: No</p>
        <?php endif;?>
        <?php if($dato['baneado'] == 1):?>
            <p>¿Baneado?: Si, hasta <?= date("d/m/Y", $dato['fechafinban']) ?></p>
        <?php endif;?>
        <?php if($dato['fechabaja'] != null):?>
            <p>Fecha de baja: <?= date("d/m/Y", $dato['fechabaja']) ?></p>
        <?php endif; ?>
    </main>
    <a href="../listaJugadores.php">Volver al listado de jugadores</a>
</body>
</html>