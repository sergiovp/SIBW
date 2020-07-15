<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
  
    require_once 'bd.php';

    $mysqli = conexionBD();
  
    session_start();
    $usuario_nuevo = $_POST['user'];
    $contraseña_nueva = $_POST['contraseña'];

    if ($usuario_nuevo && $contraseña_nueva) {
        if (aniadirUsuario($mysqli, $usuario_nuevo, $contraseña_nueva)) {
            $lista_eventos = getListaEventos($mysqli);

            echo $twig->render('index.html', ['lista_eventos' => $lista_eventos, 'user' => $infoUsuario, 
                'eventos' => $eventos]);
        } else {
            echo $twig->render('registrate.html', []);
        }
    } else {
        echo $twig->render('registrate.html', []);
    }
  
?>