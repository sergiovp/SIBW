<?php

    function conexionBD() {
        $mysqli = new mysqli("mysql", "vela", "vela", "SIBW");
        if ($mysqli->connect_errno) {
            echo ("Fallo al conectar con la base de datos: " . $mysqli->connect_error);
            exit(0);
        }
        return $mysqli;
    }

    function getEvento($idEvento, $mysqli) {
        $stmt = $mysqli->prepare("SELECT id, titulo, lugar, fecha, img1, img2,
        instagram, youtube, facebook, descripcion_p, descripcion_s, aviso FROM eventos
        WHERE id = ?");
        $stmt->bind_param("i", $idEvento);
        $stmt->execute();

        $res = $stmt->get_result();

        $evento = null;

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();

            $evento = array('id' => $row['id'],'tituloEvento' => $row['titulo'],
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

    function getListaEventos($mysqli) {
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
    }

    function getPalabrasProhibidas($mysqli) {

        $res = $mysqli->query(("SELECT * FROM palabras_prohibidas"));

        $array = array();

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $arrayInfo = $row['palabra_prohibida'];

                array_push($array, $arrayInfo);
            }
        }
        return $array;
    }

    function getComentarios($mysqli) {
        $res = $mysqli->query(("SELECT * FROM comentarios"));

        $array = array();

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $arrayInfo = array('id' => $row['id'],
                'comentario' => $row['comentario'],
                'autor' => $row['autor'],
                'fecha' => $row['fecha'],
                'hora' => $row['hora']);

                array_push($array, $arrayInfo);
            }
        }
        return $array;
    }

    function getUsuarios($mysqli) {
        $res = $mysqli->query(("SELECT * FROM usuarios"));

        $array = array();

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $arrayInfo = array('user' => $row['user'],
                'pass' => $row['pass'],
                'admin' => $row['admin']);

                array_push($array, $arrayInfo);
            }
        }
        return $array;
    }

    function checkUsuario($mysqli, $user, $pass) {
        $usuarios = getUsuarios($mysqli);

        for ($i = 0; $i < sizeof($usuarios); $i++) {
            if ($usuarios[$i]['user'] === $user) {

                // El usuario coincide, comprobamos pass:
                if ($usuarios[$i]['pass'] === $pass) {
                    // Existe el usuario y pass, lo devolvemos
                    return $usuarios[$i];
                }
            }
        }
        // No existe el usuario :(
        return NULL;
    }

    function getUsuario($mysqli, $user) {
        $usuarios = getUsuarios($mysqli);

        for ($i = 0; $i < sizeof($usuarios); $i++) {
            if ($usuarios[$i]['user'] === $user) {
                return $usuarios[$i]['user'];
            }
        }
        // No existe el usuario :(
        return NULL;
    }

    function modificarUsuario($mysqli, $user_antiguo, $pass_antigua, $user_nuevo, $pass_nueva) {
        $sql = "UPDATE usuarios SET user='$user_nuevo', pass='$pass_nueva' WHERE user='$user_antiguo'";

        if(mysqli_query($mysqli, $sql)){ 
            //echo "Se ha modifcado con éxito";
        } else { 
            echo "ERROR: Could not able to execute $sql. "
                                    . mysqli_error($mysqli);
        }
    } 
?>
