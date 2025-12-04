document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-inscripcion');
    const nombre = document.getElementById('nombre');
    const email = document.getElementById('email');
    const edad = document.getElementById('edad');
    const provincia = document.getElementById('provincia');
    const mensaje = document.getElementById('mensaje');

    form.addEventListener('submit', (event) => {
        const regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if(nombre.value === "" || email.value === "" || email.match(regEmail) || edad.value === "" || provincia.value === "") {
            mensaje.innerText = 'Echa el freno, magdaleno, que tienes errores en el formulario';
            mensaje.setAttribute('style', 'display: flex;');
            const elementos = document.querySelectorAll('input, select');
            event.preventDefault();
            for(let elemento of elementos){
                if(elemento.value === ''){
                    elemento.setAttribute('style', 'border: 2px solid red;');
                    elemento.setAttribute('placeholder', 'Pero bro, escribe algo, no seas vago');
                    elemento.nextElementSibling.innerText = 'Revisa este campo, mi pana. No tienes na puesto';
                    elemento.nextElementSibling.setAttribute('style', 'color: red; font-size: 12px;');
                }else{
                    elemento.setAttribute('style', 'border: 2px solid green;');
                    elemento.setAttribute('placeholder', '');
                    elemento.nextElementSibling.innerText = '';
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