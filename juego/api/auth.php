<?php

    require '../connddbb.php';
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        exit;
    }

    $api = $_GET["api"] ?? null;
    $sql = "SELECT * FROM apiauth WHERE apikey = '$api'";
    $recogerApi = $conexion->prepare($sql);
    $recogerApi->execute();
    $usuario = $recogerApi->fetch(PDO::FETCH_ASSOC);
    if($usuario != null){
        if($usuario['fechafintoken'] == null || $usuario['fechafintoken']>time()+900){
            $token = bin2hex(random_bytes(32));
            $fechafinToken = time()+900;
            $update = "UPDATE apiauth SET token = '$token', fechafintoken = '$fechafinToken' WHERE apikey = '$api'";
            $subirToken = $conexion->prepare($update);
            $subirToken->execute();
        }
        http_response_code(200);
        echo json_encode(["OK"=>$token]);
        exit;
    }else{
        http_response_code(401);
        echo json_encode(["error"=>"Api incorrecta"]);
        exit;
    }
?>