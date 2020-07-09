
function buscarEvento() {
    var barra = document.getElementById("buscador");
    var busqueda = $(barra).val();

    hacerPeticion(busqueda);
    //console.log(busqueda);
    
}

function hacerPeticion(query) {
    $.ajax({
        url:"busqueda.php",
        method:"POST",
        data:{query:query},
        success:function(data)
        {
          mostrarEventos(data);
        }
      });
}

function mostrarEventos(data) {
    var res = JSON.parse(data);
    console.log(data);
    
    var contenidoHTML = document.getElementById("mostrar_eventos");
    contenidoHTML.innerHTML = "";

    for (var i = 0; i < res.length; i++){
        var texto = "\n" +
        "<a href=\"evento.php?ev=" + res[i]["id"] + "\">" + res[i]["nombre_artista"]+ ": " + res[i]["tipo_evento"]
        + "</a><br>";
    
        contenidoHTML.innerHTML += texto;
    }
}