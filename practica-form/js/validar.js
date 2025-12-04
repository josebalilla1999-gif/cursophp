document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-inscripcion');
    const nombre = document.getElementById('nombre');
    const email = document.getElementById('email');
    const edad = document.getElementById('edad');
    const provincia = document.getElementById('provincia');
    const mensaje = document.getElementById('mensaje');

    form.addEventListener('submit', (event) => {
        const n = nombre.value.trim();
        const e = email.value.trim();

        if(n === '' || e === '' || edad.value === '' || provincia.value === '') {
            mensaje.innerText = 'Echa el freno, magdaleno, que tienes errores en el formulario';
            mensaje.setAttribute('style', 'display: flex;');
            const elementos = document.querySelectorAll('input, select');
            event.preventDefault();
            for(let elemento of elementos){
                if(elemento.value === ''){
                    elemento.setAttribute('style', 'border: 2px solid red;');
                    elemento.setAttribute('placeholder', 'Pero bro, escribe algo, no seas vago');
                    elemento.nextElementSibling.innerText = 'Revisa este campo, mi pana. No tienes na puesto';
                }
            }
        }
        // if(n === ''){
        //     document.getElementById('nombre').setAttribute('style', 'border: 2px solid red;');
        // }
        // if(e === ''){
        //     document.getElementById('email').setAttribute('style', 'border: 2px solid red;');
        // }
        // if(edad.value === ''){
        //     document.getElementById('edad').setAttribute('style', 'border: 2px solid red;');
        // }
        // if(provincia.value === ''){
        //     document.getElementById('provincia').setAttribute('style', 'border: 2px solid red;');
        // }
    });
}, true);