<?php 
    require 'inc/cabecera.php';
?>
<body>
    <?php
    include 'inc/titulo.php';
        $pais = 'Japon';
        $numero_islas = 35;
        $es_independiente = true;
        echo "<h1>Literatura japonesa. Un compendio de libros y autores de $pais</h1>";
        //echo '<h1>Literatura japonesa. Un compendio de libros y autores de ' .$pais. '</h1>';
        echo "<p>$pais es un estado insular compuesto por $numero_islas islas</p>";
        if($es_independiente){
            echo "<p>$pais es un pais independiente</p>";
        }else{
            echo "<p>$pais es un pais dependiente</p>";
        }

        $suma = 32+$numero_islas;
        $resta = $numero_islas-32;
        $producto = 2*$numero_islas;
        $division = $numero_islas/5;
        $resto = 360%$numero_islas;

        echo '<p>'.$suma.'</p>';
        echo '<p>'.$resta.'</p>';
        echo '<p>'.$producto.'</p>';
        echo '<p>'.$division.'</p>';
        echo '<p>'.$resto.'</p>';

        //Esto es un comentario de una linea
        /*Esto es un comentario
        de varias lineas, y como
        no se que mas escribir
        para rellenar, voy a decir
        que vendo magdalenas
        */
    ?>
    <script>
        let valor = 4;
    </script>
<script src="js/script.js"></script>
</body>
</html>