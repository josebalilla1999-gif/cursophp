const zona = document.getElementById("zona");
const form = document.getElementById("form");
const input = document.getElementById("archivo");
const btn = document.getElementsByClassName("btn");

for(let boton of btn){
    boton.addEventListener("click", mostrarElementos);
}

function mostrarElementos(){
    if(!document.getElementById("opciones")){
        const div = document.createElement("div");
        div.classList.add("opciones");
        div.setAttribute("id", "opciones");
        div.style.display = "flex";
        div.style.backgroundColor = "rgb(255,255,255)";
        const a = document.createElement("a");
        a.innerHTML = "<span class=material-symbols-outlined btn>delete</span>Eliminar";
        a.setAttribute("href", "index.php?nombrearchivo=" + encodeURI(this.dataset.nombrearchivo));
        div.append(a);
        const b = document.createElement("a");
        b.innerHTML = "<span class=material-symbols-outlined btn>download</span>Descargar";
        b.setAttribute("href", "templates/" + encodeURI(this.dataset.nombrearchivo));
        b.setAttribute("target", "_blank");
        b.setAttribute("download", encodeURI(this.dataset.nombrearchivo));
        div.append(b);
        this.parentElement.append(div);
    }else{
        document.getElementById("opciones").remove();
    }
}

zona.addEventListener("dragover", function (e) {
    e.preventDefault();
    zona.classList.add("drag");
});

zona.addEventListener("dragleave", function (e) {
    e.preventDefault();
    zona.classList.remove("drag");
});

zona.addEventListener("drop", function (e) {
    e.preventDefault();
    zona.classList.remove('drag');

    const archivo = e.dataTransfer.files[0];

    const dt = new DataTransfer();
    dt.items.add(archivo);
    input.files = dt.files;

    form.submit(); 
});