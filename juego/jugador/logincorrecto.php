<?php
if ($_POST['resultado_usuario'] == $_POST['resultado_correcto']) {
    echo "Login correcto";
} else {
    echo "La suma es incorrecta<br><a href='loginJugador.php'>Volver al login</a>";
}
?>