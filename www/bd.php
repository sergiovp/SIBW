<?php

    function conexionBD() {
        $mysqli = new mysqli("mysql", "vela", "vela", "SIBW");
        if ($mysqli->connect_errno) {
            echo ("Fallo al conectar con la base de datos: " . $mysqli->connect_error);
            exit(0);
        }
        return $mysqli;
    }

    function getEvento($idEvento) {
        
        $mysqli = conexionBD();

        $res = $mysqli->query("SELECT id, titulo, lugar, fecha, img1, img2,
        instagram, youtube, facebook, descripcion_p, descripcion_s, aviso FROM eventos
        WHERE id=" . $idEvento);

        $evento = null;

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();

            $evento = array('tituloEvento' => $row['titulo'],
                'lugarEvento' => $row['lugar'],
                'fechaEvento' => $row['fecha'],
                'img1' => $row['img1'],
                'img2' => $row['img2'],
                'instagram' => $row['instagram'],
                'youtube' => $row['youtube'],
                'facebook' => $row['facebook'],
                'descripcion_principal' => $row['descripcion_p'],
                'descripcion_secundaria' => $row['descripcion_s'],
                'aviso' => $row['aviso']);
        }
        return $evento;
    }

    function getListaEventos() {
        $mysqli = conexionBD();

        $res = $mysqli->query(("SELECT id, img, nombre_artista, tipo_evento, descripcion
        FROM lista_eventos"));

        $array = array();

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $arrayInfo = array('id' => $row['id'],
                'img' => $row['img'],
                'nombre_artista' => $row['nombre_artista'],
                'tipo_evento' => $row['tipo_evento'],
                'descripcion' => $row['descripcion']);

                array_push($array, $arrayInfo);
            }
        }

        return $array;
        //print_r($array[1]);
        
    }
?>
