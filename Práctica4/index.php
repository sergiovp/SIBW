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
    }

    $lista_eventos = getListaEventos($mysqli);

    echo $twig->render('index.html', ['lista_eventos' => $lista_eventos, 'user' => $infoUsuario]);
    
    $mysqli->close();
?>
