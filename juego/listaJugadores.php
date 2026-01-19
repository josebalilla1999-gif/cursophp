<?php

require 'connddbb.php';
ini_set('display_errors', 1);

$sql = "SELECT id, nick, nombre, apellidos, email, fechanacimiento, baneado, fechafinban, fechabaja FROM usuarios";
$usuarios = $conexion->prepare($sql);
$usuarios->execute();
$datos = $usuarios->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jugadores</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <h1>Lista de jugadores</h1>
    <a href="admin/crearJugador.php">Crear jugador nuevo</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nick</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Fecha de nacimiento</th>
                <th>Baneado</th>
                <th>Fecha fin baneo</th>
                <th>Fecha de baja</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos as $dato){
                $id = $dato['id']?>
            <tr>
                <td><a href="datosJugador.php/?id=<?=$id?>"><?=$id?></a></td>
                <td><?= $dato['nick'] ?></td>
                <td><?= $dato['nombre'] ?></td>
                <td><?= $dato['apellidos'] ?></td>
                <td><?= $dato['email'] ?></td>
                <td><?= date("d/m/Y", $dato['fechanacimiento']) ?></td>
                <?php if($dato['baneado'] == 0):?>
                    <td colspan="2">No</td>
                <?php endif;?>
                <?php if($dato['baneado'] == 1):?>
                    <td>Si</td>
                    <td><?= date("d/m/Y", $dato['fechafinban']) ?></td>
                <?php endif;?>
                <?php if($dato['fechabaja'] != null):?>
                    <td><?= date("d/m/Y", timestamp: $dato['fechabaja']) ?></td>
                <?php endif;?>
                <?php if($dato['fechabaja'] == null):?>
                    <td>Esta de alta</td>
                <?php endif;?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>