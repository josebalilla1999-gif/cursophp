<section class="desarrollo">
    <h3 style="text-align: center; font-size: 2rem;">Funciones sin parametros</h3>
    <p style="text-align: center;">Son funciones que no necesitan ningún dato externo para funcionar. Nosotros las llamamos y ellas hacen lo suyo, como ese amigo que empieza a hablar sin que nadie pregunte nada.</p>
    <pre><code class="language-php">
        <?php
            echo htmlspecialchars('<?php');
        ?><br>
        &ensp;function saludar() {<br>
            &ensp;&ensp;echo "¡Hola! Bienvenido a aprender PHP.";<br>
        &ensp;}<br>
        &ensp;saludar();<br>
        <?php echo htmlspecialchars('?>');?><br>
    </code></pre>
    <p>El resultado en pantalla seria:</p>
    <strong class="paint"><?php
        function saludar() {
            echo '¡Hola! Bienvenido a aprender PHP.<br>';
        }
        saludar();
    ?></strong>
    <h3 style="text-align: center; font-size: 2rem;">Funciones con parametros</h3>
    <p style="text-align: center;">Las funciones con parametros o argumentos permiten pasar datos, incluidos en los parentesis, que nos permitiran operar con ellos dentro de la funcion, en el interior de las llaves</p>
    <pre><code class="language-php">
        <?php
            echo htmlspecialchars('<?php');
        ?><br>
        &ensp;function sumar(int $a, int $b) {<br>
            &ensp;&ensp;$suma = $a + $b;<br>
            &ensp;&ensp;echo 'La suma de los dos numeros es: ' . $suma;<br>
        &ensp;}<br>
        &ensp;sumar(17, 25);<br>
        <?php echo htmlspecialchars('?>');?><br>
    </code></pre>
    <p>El resultado en pantalla seria:</p>
    <strong class="paint"><?php
        function sumar(int $a, int $b) {
            $suma = $a + $b;
            echo 'La suma de los dos numeros es ' . $suma . '<br>';
        }
        sumar(17, 25);
    ?></strong>
    <h3 style="text-align: center; font-size: 2rem;">Funciones con parametros opcionales</h3>
    <p style="text-align: center;">Las funciones con parametros opcionales anadiran un parametro por defecto si no lo incluimos en su llamada</p>
    <pre><code class="language-php">
        <?php
            echo htmlspecialchars('<?php');
        ?><br>
        &ensp;function saludando($nombre = 'mundo') {<br>
        &ensp;&ensp;echo 'Hola ' . $nombre;<br>
        &ensp;}<br>
        &ensp;saludando();<br>
        &ensp;saludando('Chemita');<br>
        <?php echo htmlspecialchars('?>');?><br>
    </code></pre>
    <p>El resultado en pantalla seria:</p>
    <strong class="paint"><?php
        function saludando($nombre = 'mundo') {
            echo 'Hola ' . $nombre . '<br>';
        }
        saludando() 
        . '<br>' . 
        saludando('Chemita');
    ?></strong>
    <h3 style="text-align: center; font-size: 2rem;">Funciones con parametros variables</h3>
    <p style="text-align: center;">Las funciones con parametros variables permiten anadir un numero indeterminado de argumentos</p>
    <pre><code class="language-php">
        <?php
            echo htmlspecialchars('<?php');
        ?><br>
        &ensp;function sumando(...$numeros) {<br>
        &ensp;&ensp;return array_sum($numeros)<br>
        &ensp;}<br>
        &ensp;echo sumando(4, 6, 7, 2, 8, 3, 5);<br>
        <?php echo htmlspecialchars('?>');?><br>
    </code></pre>
    <p>El resultado en pantalla seria:</p>
    <strong class="paint"><?php
        function sumando(...$numeros) {
            return array_sum($numeros);
        }
        echo sumando(4, 6, 7, 2, 8, 3, 5) . '<br>';
    ?></strong>
</section>