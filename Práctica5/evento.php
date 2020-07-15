<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $idEvento = -1;
    if (isset($_GET['ev'])) {
        $idEvento = $_GET['ev'];
    }
    $mysqli = conexionBD();

    $evento = getEvento($idEvento, $mysqli);

    // Empezamos la sesión
    session_start();


    if (isset($_SESSION['user'])) {
        $usuario = getUsuario($mysqli, $_SESSION['user']);
        $infoUsuario = checkUsuario($mysqli, $_SESSION['user'], $_SESSION['pass']);
    }

    if (!$evento) {
        echo $twig->render('error.html');

    } else {
        $palabrasProhibidas = getPalabrasProhibidas($mysqli);
        $comentarios = getComentarios($mysqli);

        echo $twig->render('evento.html',['evento' => $evento,
        'palabrasProhibidas' => $palabrasProhibidas,
        'comentarios' => $comentarios, 'user' => $infoUsuario]);
    }
    
    $mysqli->close();
?>
