<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $mysqli = conexionBD();

    // Empezamos la sesión
    session_start();
    $usuario_nuevo = $_POST['user'];
    $contraseña_nueva = $_POST['contraseña'];
    modificarUsuario($mysqli, $_SESSION['user'], $_SESSION['pass'], $usuario_nuevo, $contraseña_nueva);

    

    session_destroy();

    $lista_eventos = getListaEventos($mysqli);

    echo $twig->render('index.html', ['lista_eventos' => $lista_eventos, 'user' => $infoUsuario]);
    
    $mysqli->close();
?>