<section class="desarrollo">
    <pre><code class="language-php">
    $saludo = 'Hola mundo';
    $frase = 'Esto es un texto sin variables: $nombre';
    echo $frase;
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        $saludo = 'Hola mundo';
        $frase = 'Esto es un texto sin variables: $nombre';
        echo $frase;
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Strings con comillas dobles</h3>
    <p>Con comillas dobles, PHP interpreta variables y saltos de línea.</p>

    <pre><code class="language-php">
    $nombre = "Chemita";
    $texto = "Hola $nombre\nTodo bien por aquí.";
    echo $texto;
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        $nombre = "Chemita";
        $texto = "Hola $nombre\nTodo bien por aquí.";
        echo nl2br($texto);
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Concatenación de strings</h3>
    <p>Podemos unir cadenas usando el operador .</p>

    <pre><code class="language-php">
    $inicio = "Hola";
    $fin = "mundo";
    echo $inicio . " " . $fin;
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        $inicio = "Hola";
        $fin = "mundo";
        echo $inicio . " " . $fin;
        ?>
    </strong>
    <h3 style="text-align: center; font-size: 2rem;">Concatenación compuesta</h3>
    <p>Podemos ir añadiendo texto a una variable existente usando .=</p>

    <pre><code class="language-php">
    $mensaje = "Hola";
    $mensaje .= " a todos";
    $mensaje .= " los presentes.";
    echo $mensaje;

    // también podemos generar la misma concatenación con la siguiente sintáxis
    $mensaje2 = "Buenos días "
    . " a todas "
    . " las personas,";
    echo $mensaje2;
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        $mensaje = "Hola";
        $mensaje .= " a todos";
        $mensaje .= " los presentes.";
        echo $mensaje;
        $mensaje2 = "Buenos días "
        . " a todas "
        . " las personas,";
        echo $mensaje2;
        ?>
    </strong>
    <h3 style="text-align: center; font-size: 2rem;">Strings multilinea con Nowdoc</h3>
    <p>Nowdoc funciona igual que Heredoc, pero todo el contenido es literal</p>
    <pre><code class="language-php">
    $codigo = &lt;&lt;&lt;'CODIGO'
    Hola $nombre
    Esto es literal.
    CODIGO;
    echo $codigo;
    </code></pre>
    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        $codigo = <<<'CODIGO'
        Hola $nombre
        Esto es literal.
        CODIGO;
        echo $codigo;
        ?>
    </strong>
    <p>
    <?php
        echo strlen('Sevilla') . '<br>';
        echo mb_strlen('Sevilla') . '<br>';
        echo strtoupper('Sevilla') . '<br>';
        echo strtolower('Sevilla') . '<br>';
        echo ucwords('chemita') . '<br>';
        echo strpos('Albion Online es un MMORPG no lineal en el que puedes forjar tu propia historia sin seguir un camino prefijado...', 'MMORPG') . '<br>';
        $texto = 'Tetas tetitas tetazas tetonas tetarracas tetungas...';
        $textoCambiado = str_replace('tetungas', 'mabungos', $texto);
        echo $texto . '<br>';
        echo $textoCambiado . '<br>';
    ?></p>
</section>