
document.addEventListener("DOMContentLoaded", () => {
  const dropzone = document.getElementById("zona");

  dropzone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropzone.classList.add("hover");
  });

  dropzone.addEventListener("dragleave", () => {
    dropzone.classList.remove("hover");
  });

  dropzone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropzone.classList.remove("hover");

    const archivo = e.dataTransfer.files[0];
    if (!archivo) {
      alert("No hay archivo");
      return;
    }

    const formData = new FormData();
    formData.append("archivo", archivo);

    fetch("upload.php", {
      method: "POST",
      body: formData,
    })
      .then((r) => r.text())
      .then((txt) => {
        quitaPonMensaje({
          mensaje: txt,
          duracion: 2000,
          rueda: true,
        });
      })
      .catch((err) => alert("Error: " + err));
  });
});
