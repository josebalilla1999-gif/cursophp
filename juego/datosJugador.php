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
    <link rel="stylesheet" href="static/css/styles.css">
</head>
<body>
    <header>
        <h1>Datos de jugador</h1>
    </header>
    <form method="POST" action="../modificarJugador.php">
        <p>Id: <?= $dato['id'] ?></p>
        <input type="hidden" name="id" value="<?= $dato['id'] ?>">
        <p>Nick: <input type="text" id="nick" name="nick" value="<?= $dato['nick'] ?>"></p>
        <p>Nombre: <input type="text" id="nombre" name="nombre" value="<?= $dato['nombre'] ?>"></p>
        <p>Apellidos: <input type="text" id="apellidos" name="apellidos" value="<?= $dato['apellidos'] ?>"></p>
        <p>Email: <?= $dato['email'] ?></p>
        <input type="hidden" name="email" value="<?= $dato['email'] ?>">
        <p>Fecha de nacimiento: <?= date("d/m/Y", $dato['fechanacimiento']) ?></p>
        <input type="hidden" name="fechanacimiento" value="<?= $dato['fechanacimiento'] ?>">
        <p>Fecha de alta: <?= date("d/m/Y", $dato['fechaalta']) ?></p>
        <input type="hidden" name="fechaalta" value="<?= $dato['fechaalta'] ?>">
        <?php if($dato['baneado'] == 0):?>
            <p>¿Baneado?: No</p>
            <input type="hidden" name="baneado" value="<?= $dato['baneado'] ?>">
            <p>Banear: 
                <select id="banear" name="banear">
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </p>
            <p>Banear hasta: <input type="datetime-local" id="fechafinban" name="fechafinban" min="<?= time() ?>" max="<?= time()+31536000 ?>"></p>
        <?php endif;?>
        <?php if($dato['baneado'] == 1):?>
            <p>¿Baneado?: Si, hasta <?= date("d/m/Y", $dato['fechafinban']) ?></p>
            <input type="hidden" name="baneado" value="<?= $dato['baneado'] ?>">
            <p>Desbanear: 
                <select id="desbanear" name="desbanear">
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </p>
        <?php endif;?>
        <?php if($dato['fechabaja'] != null):?>
            <p>Fecha de baja: <?= date("d/m/Y", $dato['fechabaja']) ?></p>
            <input type="hidden" name="fechabaja" value="<?= $dato['fechabaja'] ?>">
            <p>Recuperar jugador: 
                <select id="recuperar" name="recuperar">
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </p>
        <?php endif; ?>
        <?php if($dato['fechabaja'] == null):?>
            <p>Usuario activo</p>
            <input type="hidden" name="fechabaja" value="<?= $dato['fechabaja'] ?>">
            <p>¿Dar de baja?: 
                <select id="dardebaja" name="dardebaja">
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </p>
        <?php endif; ?>
        <button type="submit">Modificar jugador</button>
    </form>
    <a href="../listaJugadores.php">Volver al listado de jugadores</a>
</body>
</html>