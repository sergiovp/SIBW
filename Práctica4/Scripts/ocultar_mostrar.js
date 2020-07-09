function ocultarMostrar() {
    var formulario, estilos_formulario, estilo;
    formulario = document.querySelector('#parte_formulario');
    estilos_formulario = getComputedStyle(formulario);
    estilo = estilos_formulario.display;
    
    if (estilo == "none") {
        document.getElementById("parte_formulario").style.display="block"
        document.getElementById("parte_enlaces").style.display="none"
    } else {
        document.getElementById("parte_formulario").style.display="none"
        document.getElementById("parte_enlaces").style.display="block"
    }
}