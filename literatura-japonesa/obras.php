<?php
    $seccion = 'Obras destacadas.';
    require_once "inc/cabecera.php";
?>

<section id="obras">
    <?php
        $obras = ['Kokoro' => 'Natsume Soseki', 
                    'El libro de la Almohada' => 'Sei Shonagon', 
                    'Kafka en la orilla' => 'Haruki Murakami', 
                    'El rumor del oleaje' => 'Yukio Mishima', 
                    'Confesiones de una mascara' => 'Yukio Mishima', 
                    'Tokio Blues (Norwegian Wood)' => 'Haruki Murakami'];
        echo $obras['Kokoro'] . '<br>';
        echo count($obras). '<br>';
        array_push($obras, 'Mi vecino Totoro'). '<br>';
        array_pop($obras);
        $solo_obras = array_keys($obras);
        $solo_autores = array_values($obras);
        echo $solo_obras[2] . '<br>';
        sort($solo_obras);
        echo $solo_obras[2] . '<br>';

    ?>
    <h2>Obras Destacadas</h2>
    <ul>
        <li><strong>Kokoro</strong> — Natsume Sōseki (1914)</li>
        <li><strong>El Libro de la Almohada</strong> — Sei Shōnagon (c. 1002)</li>
        <li><strong>Kafka en la orilla</strong> — Haruki Murakami (2002)</li>
        <li><strong>El rumor del oleaje</strong> — Yukio Mishima (1954)</li>
        <li><strong>Confesiones de una máscara</strong> — Yukio Mishima (1949)</li>
        <li><strong>Tokio Blues (Norwegian Wood)</strong> — Haruki Murakami (1987)</li>

        <?php 
            // for($i = 0; $i < count($solo_obras); $i++){
            //     $autores[] = array_values($obras)[$i];
            //     echo "<li>" . $solo_obras[$i] ." - ". $autores[$i] . "</li>";
            // }
            foreach($obras as $obra => $autor){
                echo "<li><strong>" . $obra . "</strong> — " . $autor . "</li>";
            }
        ?>
    </ul>
</section>

<?php
    require_once "inc/pie.php";
?>