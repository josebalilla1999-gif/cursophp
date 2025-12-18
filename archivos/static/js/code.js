const archivos = document.getElementsByClassName("archivo");
console.log(archivos);

for (let archivo of archivos) {
  archivo.addEventListener("click", function (event) {
    const datos = archivo.nextElementSibling;

    datos.classList.add("visible");
    datos.style.left = event.clientX + "px";
    datos.style.top = event.clientY  + "px";
    datos.querySelector('.cerrar').addEventListener('click', function(){
      console.log('HOla')
      this.parentElement.classList.remove('visible')
    })
  });
}
