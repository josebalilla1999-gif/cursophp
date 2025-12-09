const zona = document.getElementById("zona");
const form = document.getElementById("form");
const input = document.getElementById("archivo");

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