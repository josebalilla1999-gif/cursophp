var cabecera = document.head;
var enlace = document.createElement('link');
enlace.setAttribute('rel', 'stylesheet');
enlace.setAttribute('href', 'static/css/estilos.css');
cabecera.append(enlace);

document.getElementById('coloresfondo').addEventListener('change', () => {
    if(document.getElementById('coloresletra').value == document.getElementById('coloresfondo').value  && document.getElementById('coloresfondo').value != 'black'){
        document.body.style.backgroundColor = document.getElementById('coloresfondo').value;
        document.body.style.color = 'black';
    }else if(document.getElementById('coloresfondo').value == 'black'){
        document.body.style.backgroundColor = document.getElementById('coloresfondo').value;
        document.body.style.color = 'white';
    }else if(document.getElementById('coloresletra').value == document.getElementById('coloresfondo').value && document.getElementById('coloresfondo').value == 'black'){
        document.body.style.backgroundColor = document.getElementById('coloresfondo').value;
        document.body.style.color = 'white';
    }
    else{
        document.body.style.backgroundColor = document.getElementById('coloresfondo').value;
        document.body.style.color = document.getElementById('coloresletra').value;
    }
}, true);

document.getElementById('coloresletra').addEventListener('change', () => {
    if(document.getElementById('coloresletra').value == document.getElementById('coloresfondo').value  && document.getElementById('coloresletra').value != 'black'){
        document.body.style.color = 'black';
        document.body.style.backgroundColor = document.getElementById('coloresfondo').value;
    }else if(document.getElementById('coloresletra').value == 'black' && document.getElementById('coloresfondo').value == 'black'){
        document.body.style.color = document.getElementById('coloresletra').value;
        document.body.style.backgroundColor = 'white';
    }else if(document.getElementById('coloresletra').value == document.getElementById('coloresfondo').value && document.getElementById('coloresletra').value == 'black'){
        document.body.style.color = document.getElementById('coloresletra').value;
        document.body.style.backgroundColor = 'white';
    }else{
        document.body.style.color = document.getElementById('coloresletra').value;
        document.body.style.backgroundColor = document.getElementById('coloresfondo').value;
    }
}, true);