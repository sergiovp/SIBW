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

    if (!$evento) {
        echo $twig->render('error.html');

    } else {
        $palabrasProhibidas = getPalabrasProhibidas($mysqli);
        $comentarios = getComentarios($mysqli);

        echo $twig->render('evento.html',['evento' => $evento,
        'palabrasProhibidas' => $palabrasProhibidas,
        'comentarios' => $comentarios]);
    }
    
    $mysqli->close();
?>
