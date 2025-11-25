<footer>
    <p>© 2025 — Sitio demostrativo sobre literatura japonesa</p>
</footer>
<script>
    //alert('¡OJO CUIDAO! ¿Seguro que deseas cargar la web?');
    const nombrepagina = '<?php echo basename(path:$_SERVER['PHP_SELF']);?>';
    console.log(nombrepagina);
    const enlaces = document.querySelectorAll('nav a');
    for(let enlace of enlaces){
        if(enlace.getAttribute('href')==nombrepagina){
            enlace.classList.add('activa');
            /*let texto = enlace.innerText;
            enlace.parentElement.innerText = texto;
            */
            enlace.setAttribute('style', 'display: none;');
        }
    }
</script>
</body>
</html>