<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $edad = trim($_POST['edad'] ?? '');
    $provincia = trim($_POST['provincia'] ?? '');

    $errores = [];

    if($nombre === ''){
        array_push($errores, '¿Que no tienes nombre? Po yo te viá llamá cabesa');
    }
    if($email === ''){
        array_push($errores, 'ahorayatienescorreopelotudo@gmail.com');
    }
    if($email !== '' && !str_contains($email, '@')){
        array_push($errores, 'Toma, te olvidaste de esto, pedazo de genio -> @ <-');
    }
    if($email !== '' && !str_contains($email, '.')){
        array_push($errores, 'Toma, te olvidaste de esto, pedazo de genio -> . <-');
    }
    if($edad === ''){
        array_push($errores, '"La edad no se pregunta", dijo un sabio. Pues pa sabio, lo que aquí me cuelga, pon tu edad.');
    }
    if($provincia === ''){
        array_push($errores, 'Eres ciudadano del mundo, supongo');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel = "stylesheet" href= "../css/estilos.css">
</head>
<body>
    <?php
        if(!empty($errores)){
            echo '<h2>Cuando sepas escribir un formulario, me avisas. La has pencao en estos aspectos:</h2>';
            echo '<ul class="errores">';
            foreach($errores as $error){
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
            if(count($errores) === 1){
                echo '<p>Un solo error puede ser un despiste, puede ser que te lo perdonemos</p>';
            }
            if(count($errores) === 2){
                echo '<p>Aquí veo yo dos fallos, un despiste puede ser pasable, pero dos...no sé yo</p>';
            }
            if(count($errores) === 3){
                echo '<p>Tres errores como tres neuronas que tienes en tu sistema nervioso, genio</p>';
            }
            if(count($errores) > 3){
                echo '<p>Pregunta seria, ¿tus padres son primos o algo?</p>';
            }
        }else{
            echo '<p>';
            echo 'Te llamas ' . ucwords($nombre) . '<br>';
            echo 'Su correo electrónico es ' . strtolower($email) . '<br>';
            echo 'Tienes ' . $edad . ' años<br>';
            echo 'Resides en ' . ucwords($provincia) . '<br>';
            echo '</p>';
        }
    ?>
    <p><a href="../index.html">Regresar al formulario</a></p>
</body>
</html>