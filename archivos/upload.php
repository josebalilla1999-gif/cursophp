<?php
session_start();

$carpeta = 'uploads/';
$extPermitidas = ['jpg','jpeg','png','doc','zip','xls','pdf'];

if (!isset($_FILES['archivo'])) {
    echo "No se recibió ningún archivo";
    exit;
}

$nombre = basename($_FILES['archivo']['name']);
$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

if (!in_array($ext, $extPermitidas)) {
    echo "Tipo de archivo no permitido";
    exit;
}

if (!is_dir($carpeta)) {
    mkdir($carpeta, 0755, true);
}

move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta . $nombre);
echo "Archivo subido correctamente";
