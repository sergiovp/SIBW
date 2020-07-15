
function validacion() {
    var imgportada, nombre_artista, tipo_evento, descripción, lugar,
        fecha_evento, img1, img2, instagram, youtube, facebook, descripcion_p, descripcion_s, aviso;

    imgportada = document.getElementById("imgportada").value;

    nombre_artista = document.getElementById("nombre_artista").value;

    tipo_evento = document.getElementById("tipo_evento").value;

    descripción = document.getElementById("descripción").value;

    lugar = document.getElementById("lugar").value;

    fecha_evento = document.getElementById("fecha_evento").value;

    img1 = document.getElementById("img1").value;

    img2 = document.getElementById("img2").value;

    instagram = document.getElementById("instagram").value;

    youtube = document.getElementById("youtube").value;

    facebook = document.getElementById("facebook").value;

    descripcion_p = document.getElementById("descripcion_p").value;

    descripcion_s = document.getElementById("descripcion_s").value;

    aviso = document.getElementById("aviso").value;

    if (!imgportada || !nombre_artista || !tipo_evento || !descripcion_p || !lugar ||
        !fecha_evento || !img1 || !img2 || !instagram || !youtube || !facebook || !descripcion_p ||
            !descripcion_s || !aviso) {
        
            alert("Deben rellenarse todos los campos.");
            return false; 
    }
    return true;
}