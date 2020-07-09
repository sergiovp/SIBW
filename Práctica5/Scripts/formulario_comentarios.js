/* Variables globales */
var palabra = "";
var tamanio = 0;


var contador = 0;

/* Comprobamos que el formulario ha sido completado correctamente */
function validarFormulario() {
    var nombre, email, comentario;

    nombre = document.getElementById("nombre").value;
    email = document.getElementById("correo").value;
    comentario = document.getElementById("comentario").value;

    expresion_correo = /\w+@\w+\.+[a-z]/;
    
    if (!nombre) {
        alert("El campo \"Nombre\" está vacío. Por favor, rellénelo.");
        return false; 
    } 
    else if (!email) {
        alert("El campo \"E-mail\" está vacío. Por favor, rellénelo.");
        return false; 
    } 
    else if (!comentario) {
        alert("El campo \"Comentario\" está vacío. Por favor, rellénelo.");
        return false;
    }

    if (!expresion_correo.test(email)) {
        alert("El formato de correo introducido no es correcto. Ejemplo válido -> correo1@dominio.es");
        return false;
    } 
    else if (nombre.length > 15) {
        alert("El campo \"Nombre\" no puede tener más de 15 caracteres. Por favor, elija otro.");
        return false;
    } 
    else if (nombre.length < 3) {
        alert("El campo \"Nombre\" Debe tener al menos 3 letras. Por favor, elija otro.");
        return false;
    } 
    else if (email.length > 30) {
        alert("El campo \"Email\" no puede tener más de 30 caracteres. Por favor, elija otro.");
        return false;
    }
    else if (comentario.length > 230) {
        alert("Has puesto un comentario demasiado largo. Tiene " + comentario.length + " letras. " + 
        "El máximo permitido es 230.");
        
        return false;
    }
    return true;
}

/* Añadimos el comentario */
function aniadirComentario() {

    if (validarFormulario()) {
        var nombre, email, comentario;

        nombre = document.getElementById("nombre").value;
        email = document.getElementById("correo").value;
        comentario = document.getElementById("comentario").value;

        var fecha = new Date().toLocaleDateString();
        var tiempo = new Date();
        var hora = tiempo.getHours() + ":" + tiempo.getMinutes();
        var comentatios_anteriores = document.getElementsByClassName("comentarios_estaticos");

        contador++;
        var comentario_hecho = "<h2 class=\"h2_comentario\">Comentario "+ contador +" añadido correctamente</h2>";

        comentatios_anteriores[0].insertAdjacentHTML('beforeend', 
        "<div class=\"insertar\"><textarea class=\"comentarios\" readonly>" + comentario +
                "</textarea><div class=\"datos_usuario\"><p>"+ nombre + "</p><p>" + 
                        fecha + " | " + hora + "</p></div></div>");

        document.getElementById("hecho").innerHTML = comentario_hecho;

        return true;

    } else {
        return false;
    }
}

/* Función principal para las palabras prohibidas */
function checkProhibicion(event){

    var palabrasProhibidas = [10];

    for (var i = 0; i < 10; i++) {
        palabrasProhibidas[i] = document.getElementsByClassName("p_prohibidas")[i].innerHTML;
    }


    /* Cogemos letra a letra de lo que vayamos escribiendo */
    var letra = String.fromCharCode(event.keyCode).toLowerCase();

    var re2 = /[a-zA-Z]/;
    var comentario = document.getElementById("comentario");
    
    /* Si es una letra de la A a la z, la acumulamos */
    if (re2.test(letra)) {
        palabra += letra;
    }
    else if ((letra === " " || letra === ". " )) {
        if (esPalabraProhibida(palabra, palabrasProhibidas)) {
            cambiaPalabra(palabra);
        }
        palabra = "";
    }

    /* Si borramos letras */
    if (event.keyCode === 8) {
        palabra = palabra.substring(0, palabra.length - 1);
    }
    /* Si salto de línea */
    else if (event.keyCode === 10) {
        palabra = "";
    }
    tamanio = comentario.value.length;
}

/* ¿Es la palabra prohibida? */
function esPalabraProhibida(palabra, palabrasProhibidas) {
    for (var i = 0; i < palabrasProhibidas.length; i++) {
        if (palabra == palabrasProhibidas[i]  && (palabra.length === palabrasProhibidas[i].length)) {
            return true;
        }
    }
    return false;
}

/* Cambiamos la palabra prohibida por '*' */
function cambiaPalabra(palabra) {
    var text = document.getElementById("comentario");
    var nuevaPalabra = "";

    for (var i = 0; i < palabra.length; i++) {
        nuevaPalabra += "*";
    }

    var res = text.value.substring(0, tamanio - palabra.length) + nuevaPalabra + " ";

    text.value = res;
}
