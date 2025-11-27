<?php 
    $nombre = $_POST['nombre'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;
    $ubicacion = $_POST['ubicacion'] ?? null;
    $imagen = $_POST['imagen'] ?? null;
    $fuente = $_POST['fuente'] ?? null;
    $autor = $_POST['autor'] ?? null;
    $anio = $_POST['anio'] ?? null;
    if($nombre === null){
        $nombre = 'Cometiste un error, y debido a ello uno de los monstruos te ha atrapado. QEPD';
    }
    if($anio == null){
        $anio = 'Año desconocido';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis monstruos favoritos</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <h1><a href="../index.php" style="text-decoration: none; 
            color: rgb(17, 100, 0); font-size: 4rem;">Mis monstruos favoritos</a></h1>
    </header>
    <main style="text-align: center; font-size: 1.25rem;">
        <h2 style="font-size: 3rem;"><?= $nombre ?></h2>
        <figure><?= '<img src="../img/' . $imagen . 
            '" alt="Imagen de la criatura diabolica ' . $nombre . 
            '" style="width: 20%; height: 20%;">' ?></figure>
        <p><?= $descripcion ?></p>
        <p><strong>Lugar de origen</strong>: <?= $ubicacion ?></p>
        <p><?= $fuente . ', ' . $autor . ', ' . $anio ?></p>
    </main>
</body>
</html>