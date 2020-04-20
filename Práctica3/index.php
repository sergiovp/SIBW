<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $mysqli = conexionBD();

    $lista_eventos = getListaEventos($mysqli);

    echo $twig->render('index.html', ['lista_eventos' => $lista_eventos]);
    
    $mysqli->close();
?>
