<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  require_once 'bd.php';

  $mysqli = conexionBD();
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nick = $_POST['user'];
    $pass = $_POST['contraseña'];
  
    if (checkUsuario($mysqli, $nick, $pass)) {
      session_start();
      
      $_SESSION['user'] = $nick;  // guardo en la sesión el nick del usuario que se ha logueado
      $_SESSION['pass'] = $pass;
    }
    
    header("Location: index.php");
    
    exit();
  }
  
  echo $twig->render('login.html', []);
?>