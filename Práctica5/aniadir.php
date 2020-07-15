<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $mysqli = conexionBD();

    // Empezamos la sesión
    session_start();


    if (isset($_SESSION['user'])) {
        $usuario = getUsuario($mysqli, $_SESSION['user']);
        $infoUsuario = checkUsuario($mysqli, $_SESSION['user'], $_SESSION['pass']);
    } else {
        echo "AHORA";
    }

    if ($_GET["imgportada"]) {
        $imgportada = "Images/" . $_GET["imgportada"] . ".jpg";
        //echo $imgportada;
    }

    if ($_GET["nombre_artista"]) {
        $nombre_artista = $_GET["nombre_artista"];
        //echo $nombre_artista;
    }

    if ($_GET["tipo_evento"]) {
        $tipo_evento = $_GET["tipo_evento"];
        //echo $tipo_evento;
    }

    if ($_GET["descripción"]) {
        $descripción = $_GET["descripción"];
        //echo $descripción;
    }

    if ($_GET["lugar"]) {
        $lugar = $_GET["lugar"];
        //echo $lugar;
    }

    if ($_GET["fecha_evento"]) {
        $fecha_evento = $_GET["fecha_evento"];
        //echo $fecha_evento;
    }

    if ($_GET["img1"]) {
        $img1 = "Images/" . $_GET["img1"] . ".jpg";
        //echo $img1;
    }

    if ($_GET["img2"]) {
        $img2 = "Images/" . $_GET["img2"] . ".jpg";
        //echo $img2;
    }

    if ($_GET["instagram"]) {
        $instagram = $_GET["instagram"];
        //echo $instagram;
    }

    if ($_GET["youtube"]) {
        $youtube = $_GET["youtube"];
        //echo $youtube;
    }

    if ($_GET["facebook"]) {
        $facebook = $_GET["facebook"];
        //echo $facebook;
    }

    if ($_GET["descripcion_p"]) {
        $descripcion_p = $_GET["descripcion_p"];
        //echo $descripcion_p;
    }

    if ($_GET["descripcion_s"]) {
        $descripcion_s = $_GET["descripcion_s"];
        //echo $descripcion_s;
    }

    if ($_GET["aviso"]) {
        $aviso = $_GET["aviso"];
        //echo $aviso;
    }

    if (!$imgportada || !$nombre_artista || !$tipo_evento || !$descripción ||
        !$lugar || !$fecha_evento || !$img1 || !$img2 || !$instagram ||
        !$youtube || !$facebook || !$descripcion_p || !$descripcion_s || !$aviso) {

        echo $twig->render('aniadirevento.html', []);

    } else {
        // Añadir la info
        if (AniadeEventoLista($mysqli, $imgportada, $nombre_artista, $tipo_evento, $descripción)) {
            if (AniadeEventoDestalle($mysqli, $tipo_evento, $lugar, $fecha_evento, $img1, $img2,
                $instagram, $youtube, $facebook, $descripcion_p, $descripcion_s, $aviso)) {

                $lista_eventos = getListaEventos($mysqli);

                echo $twig->render('index.html', ['lista_eventos' => $lista_eventos, 'user' => $infoUsuario, 
                'eventos' => $eventos]);
            }
        }
    }
    
?>
