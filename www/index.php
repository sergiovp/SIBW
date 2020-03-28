<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $lista_eventos = getListaEventos();
    //print_r($lista_eventos[1]);

    echo $twig->render('index.html', ['lista_eventos' => $lista_eventos]);

?>
