<?php
    declare(strict_types=1);
    $recursos = "static/";
    $carpeta = "templates/";
    $mensaje = '';
    $extPermitidas = ['jpg' => '#9800beff', 
                        'png' => '#3f0037ff', 
                        'jpeg' => '#e270ffff', 
                        'doc' => '#0072beff', 
                        'docx' => '#0d00beff', 
                        'pdf' => '#ff0000ff', 
                        'txt' => '#000000ff', 
                        'xlsx' => '#00bebeff'];
    if(!is_dir($carpeta)){
        $mensaje = "El directorio no existe";
        mkdir($carpeta, 0755, true);
        exit();
    }else{
        $mensaje = "El directorio existe y esta disponible para su uso";
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])){
        $nombre = basename($_FILES['archivo']['name']);
        $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
        if(in_array($ext, array_keys($extPermitidas))){
            move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta.$nombre);
            $mensaje = 'Archivo permitido y subido';
        }else{
            $mensaje = 'Archivo no permitido';
        }
    }
    $archivos = array_diff(scandir($carpeta), ['.','..']);
    if(isset($_GET['nombrearchivo'])){
        $nombrearchivo = urldecode($_GET['nombrearchivo']);
        if(file_exists($carpeta.$nombrearchivo)){
            unlink($carpeta.$nombrearchivo);
            header('location:index.php');
            $mensaje = 'El archivo ha sido borrado';
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos</title>
    <link rel="stylesheet" href="<?= $recursos?>css/reset.css">
    <link rel="stylesheet" href="<?= $recursos?>css/a11y-dark.min.css">
    <link rel="stylesheet" href="<?= $recursos?>css/estilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <header>
        <h1>Gestor de archivos</h1>
    </header>
    <main>
        <table id="documentos">
            <thead>
                <tr>
                    <th colspan="2">Nombre del archivo</th>
                    <th>Tamaño</th>
                    <th>Ultima modificacion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($archivos as $archivo){ 
                    $ext = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                    $color = $extPermitidas[$ext];
                ?>
                    <tr>
                    <td><figure><img src="static/img/file.svg" alt="Extension del tipo<?= $ext; ?>"><figcaption style="color: <?= $color; ?>"><?= $ext;?></figure></td>
                    <td><?= $archivo; ?></td>
                    <td><?= @filesize($carpeta.$archivo)?> bytes</td>
                    <td><?=date('d-m-Y H:i:s', filemtime($carpeta.$archivo)+3600);?></td>
                    <td><span class="material-symbols-outlined btn" data-nombrearchivo="<?= $archivo; ?>" width="50px" height="50px">menu</span></a>
                        <!-- <div id="lista" class="opciones">
                            <a href="<?php //$carpeta.$archivo; ?>" download><span class="material-symbols-outlined" width="50px" height="50px">download</span>Descargar</a>
                            <a href="index.php?eliminar=<?php //urlencode($archivo) ?>"><span class="material-symbols-outlined" width="50px" height="50px">delete</span>Eliminar</a>
                        </div> -->
                    </td>
                    </tr><?php
                }
            ?>
            </tbody>
        </table>
        <section id="subida">
            <form id="form" action="index.php" method="POST" enctype="multipart/form-data">
                <label id="zona" title="Arrastra aquí un archivo para subir. O pulsa para buscar en tu disco.">Arrastra aquí un archivo para subir. O pulsa para buscar en tu disco.
                    <input type="file" id="archivo" name="archivo" accept="<?php foreach (array_keys($extPermitidas) as $exte) {
                                                                                echo "." . $exte . ",";
                                                                            } ?>application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                </label>
                <button>Subir archivo</button>
            </form>
        </section>
        <p><?= $mensaje ?></p>
    </main>
    <footer>
        <p>Hecho por er Chemita, con su gracia y su arte. Ole!</p>
    </footer>
    <script src="<?= $recursos?>js/script.js"></script>
    <script src="<?= $recursos?>js/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</body>
</html>