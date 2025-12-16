<?php
$carpeta = 'uploads/';
$mensaje = '';
$extPermitidas = [
    'jpg' => '#bf10b9',
    'jpeg' => '#bf10b9',
    'png' => '#79e3f3ff',
    'doc' => '#4f34fe',
    'zip' => '#ffeeb4',
    'xls' => '#28ff3d'
];
if (!is_dir($carpeta)) {
    mkdir($carpeta, 0755, true);
    $mensaje = "Se ha creado un direcorio.";
    /* exit("El directorio no existe."); */
}
$archivos = array_diff(scandir($carpeta), ['.', '..']);

if (isset($_GET['nombrearchivo'])) {
    $nombrearchivo = urldecode($_GET['nombrearchivo']);
    if (file_exists($carpeta . $nombrearchivo)) {
        unlink($carpeta . $nombrearchivo);
        /*         header('location:index.php'); */
    }
}
foreach ($archivos as $archivo) {
    $ext = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $color = $extPermitidas[$ext];
}
?>

<h2>Archivos</h2>
<section>
    <figure>
        <img class="file" src="<?= $recursos ?>img/file.svg" alt="Extensión del tipo <?= $ext;  ?>">
        <figcaption style="background-color:<?= $color;  ?>"><?= $ext;  ?></figcaption>
    </figure>
</section>