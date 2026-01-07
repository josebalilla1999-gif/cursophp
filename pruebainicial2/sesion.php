<?php 
    session_start();
    $_SESSION['usuario'] = 'Chemita';
?>
<p>Has iniciado sesion como <?= $_SESSION['usuario'] ?></p>
<a href="index.php">Volver a la pagina principal</a>