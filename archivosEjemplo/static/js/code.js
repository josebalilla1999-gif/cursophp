const archivos = document.getElementsByClassName('explorador')[0].getElementsByClassName('archivo');
console.log(archivos);
for(let archivo of archivos){
    archivo.addEventListener('click', function(event) {
        const datos = archivo.nextElementSibling;
        datos.classList.add('visible');
        //datos.style.left = event.clientX + 'px';
        //datos.style.top = event.clientY + 'px';
        datos.getElementsByClassName('cerrar')[0].addEventListener('click', () =>{
            datos.classList.remove('visible');
        })
    })
}