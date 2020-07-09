<?php

    include ("bd.php");

    $mysqli = conexionBD();
    session_start();

    if (isset($_SESSION['user'])) {
        $usuario = getUsuario($mysqli, $_SESSION['user']);
        $infoUsuario = checkUsuario($mysqli, $_SESSION['user'], $_SESSION['pass']);
    }

    if (isset($_POST["query"]) ){
        $query = $_POST["query"];
        $eventos = buscarEventos($mysqli, $query);
    }

    //echo $eventos;
    echo json_encode($eventos);

?>