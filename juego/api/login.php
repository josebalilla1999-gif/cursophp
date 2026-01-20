<?php

require '../connddbb.php';
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['error' => 'Metodo no permitido']);
        exit;
    }

    $api = $_GET["api"] ?? null;
    $token = $_GET["token"] ?? null;
    $sql = "SELECT * FROM apiauth WHERE apikey = '$api' AND token = '$token'";
    $recoger = $conexion->prepare($sql);
    $recoger->execute();
    $usuario = $recoger->fetch(PDO::FETCH_ASSOC);
    if($usuario != null){
        if($usuario['fechafinToken']<time()){
            http_response_code(401);
            echo json_encode(["error"=>"Token expirado"]);
            header('location:auth.php');
        }else{
            http_response_code(200);
            echo json_encode(["OK"=>'Estas dentro']);
            exit;
        }
    }else{
        http_response_code(401);
        echo json_encode(["error"=>"Api o token incorrectos"]);
        exit;
    }
?>