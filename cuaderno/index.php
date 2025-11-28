<?php
    require 'inc/datos.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuaderno PHP</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <h1></h1>
        <nav>
            <ul>
                <?php foreach($tematicas as $clave => $tema):?>
                    <li><a href="?tema=<?= $clave ?>"><?= $tema["menu"]?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php
            $eltema = $_GET['tema'] ?? null;
            if(!$eltema || !isset($tematicas[$eltema])){
        ?>
        <h2>Inicio</h2>
        <p>Puedes elegir una opcion del menu para comenzar a aprender</p>
        <?php 
            }else{
        ?>
        <h2><?= $tematicas[$eltema]['titulo'] ?></h2>
        <p><?= $tematicas[$eltema]['descripcion'] ?></p>
        <?php
            }
        ?>
    </main>
</body>
</html>