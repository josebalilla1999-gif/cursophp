const zona = document.getElementById("drag");
zona.addEventListener("dragover", (e) => {
    e.preventDefault();
    zona.classList.add('drag');
});
zona.addEventListener("dragleave", (e) => {
    e.preventDefault();
    zona.classList.remove('drag');
});
zona.addEventListener("drop", (e) => {
    e.preventDefault();
    zona.classList.remove('drag');
    alert('Ojo cuidao, acabas de soltar un archivo en la pagina');
    let archivo = e.dataTransfer.files[0];
    console.log(archivo.name);
    let input = document.getElementById('drag');
    input.setAttribute('value', archivo);
});