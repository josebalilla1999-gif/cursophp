<?php
setcookie('nombre_persona', '', time() - 3600);
header('location: index.php');
?>