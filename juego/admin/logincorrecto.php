<?php
if ($_POST['resultado_admin'] == $_POST['resultado_correcto'] && $_POST['dios_admin'] == $_POST['dios_correcto']) {
    echo "Login correcto";
} else {
    echo "Captcha incorrecto, nuestro dios venerado y admirado te esta vigilando<br><a href='loginAdmin.php'>Volver al login</a>";
}
?>