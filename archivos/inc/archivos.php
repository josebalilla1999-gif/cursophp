<?php
$carpeta = 'uploads/';
$mensaje = '';

$extPermitidas = [
    'jpg'  => '#bf10b9',
    'jpeg' => '#bf10b9',
    'png'  => '#79e3f3',
    'doc'  => '#4f34fe',
    'zip'  => '#ffeeb4',
    'xls'  => '#28ff3d',
    'pdf'  => '#ff6b6b'
];


if (!is_dir($carpeta)) {
    mkdir($carpeta, 0755, true);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {

    $nombre = basename($_FILES['archivo']['name']);
    $tmp = $_FILES['archivo']['tmp_name'];
    $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

    if (!array_key_exists($ext, $extPermitidas)) {
        $mensaje = "Tipo de archivo no permitido";
    } else {
        move_uploaded_file($tmp, $carpeta . $nombre);
        $mensaje = "Archivo subido correctamente";
    }
}




$archivos = array_diff(scandir($carpeta), ['.', '..']);
?>

<h2>Explorador de archivos</h2>

<form class="subida" method="POST" enctype="multipart/form-data">
    <input type="file" name="archivo" required>
    <button type="submit">Subir</button>
</form>

<section class="explorador">
    <?php foreach ($archivos as $archivo): ?>
        <?php
        $ext = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        $color = $extPermitidas[$ext] ?? '#ccc';
        ?>

        <figure class="archivo">
            <img src="static/img/file.svg" alt="<?= $ext ?>">
            <figcaption>
                <span class="extension" style="background-color:<?= $color ?>"><?= $ext ?></span>
                <span class="nombre"><?= htmlspecialchars($archivo) ?></span>
            </figcaption>

        </figure>
        <div class="datos_archivo">
           <h3>Datos del archivo</h3><span class="cerrar">✕</span>
                <table>
                    <thead></thead>
                    <tbody>
                    <tr>
                        <th>Fecha:</th>
                        <td><?= date('d-m-Y H:i:s', @filemtime($carpeta . $archivo))  ?></td>
                    </tr>
                    <tr>
                        <th>Tamaño:</th>
                        <td><?= @filesize($carpeta . $archivo);  ?></td>
                    </tr>
                    </tbody>
                </table>
                
            </div>





    <?php endforeach; ?>
</section>

<?php if ($mensaje): ?>
    <p class="mensaje"><?= $mensaje ?></p>
<?php endif; ?>