   let estilos = document.createElement('style');
    
    estilos.innerText = `.mensaje{ transition: all 0.5s ease;opacity: 0;width: 400px;position:fixed; top:50px; left:50%; transform: translateX(-50%); box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25), 0px 8px 20px rgba(0, 128, 255, 0.3), 0px 0px 10px rgba(0, 128, 255, 0.5); padding:10px;  text-align: center; background-color: #fff;  color:#000;cursor:pointer}@keyframes rodar {from {transform: rotate(0deg);} to {  transform: rotate(360deg);}}.rueda{animation: rodar 2s linear infinite;width:40px;margin:20px auto;}`;
document.head.append(estilos);

function quitaPonMensaje({
    mensaje = "Mensaje por defecto",
    duracion = 2000,
    rueda = false
} = {}) {
    let caja = document.createElement('div');
    caja.classList.add('mensaje')
    caja.style.opacity = 1;

 

    let p = document.createElement('p');
    p.innerText = mensaje;
    caja.append(p);

   if (rueda === true) {
    let fig = document.createElement("figure");
    fig.id = "rueda";

    // Creamos el SVG en su namespace
    const NS = "http://www.w3.org/2000/svg";
    let svg = document.createElementNS(NS, "svg");
    svg.setAttribute("width", "32");
    svg.setAttribute("height", "32");
    svg.setAttribute("viewBox", "0 0 32 32");

    // Función auxiliar para crear círculos
    function creaCirculo(cx, cy, r, transform) {
        let c = document.createElementNS(NS, "circle");
        c.setAttribute("cx", cx);
        c.setAttribute("cy", cy);
        c.setAttribute("r", r);
        c.setAttribute("fill", "#9C9C9C");
        if (transform) c.setAttribute("transform", transform);
        return c;
    }

    svg.append(
        creaCirculo(3.68713, 3.68713, 3.68713, "matrix(0.866025 0.5 0.5 -0.866025 18.3608 26.3191)"),
        creaCirculo(3.68713, 3.68713, 3.68713, "matrix(0.866025 0.5 0.5 -0.866025 5.49316 27.4053)"),
        creaCirculo(3.68713, 3.68713, 3.68713, "matrix(0.866025 0.5 0.5 -0.866025 0 15.7188)"),
        creaCirculo(3.68713, 3.68713, 3.68713, "matrix(0.866025 0.5 0.5 -0.866025 9.64551 6.38623)"),
        creaCirculo(3.68713, 3.68713, 3.68713, "matrix(0.866025 0.5 0.5 -0.866025 21.6201 13.2996)")
    );

    fig.append(svg);
    caja.append(fig);
}

    // El mensaje se puede cerrar al hacer click
    caja.addEventListener('click', () => caja.remove());

    document.body.append(caja);

    setTimeout(() => {
        caja.style.opacity = 0;

        setTimeout(() => {
            caja.remove();
        }, 500);

    }, duracion);
}