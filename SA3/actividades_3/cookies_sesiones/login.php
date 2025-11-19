<?php
session_start(); // Iniciar sesion
$usuario = $_POST['nombre'] ?? '';
$clave = $_POST['clave'] ?? '';
if ($usuario === 'admin' && $clave === '1234') {
        $_SESSION['nombre'] = $usuario;
        if(isset($_POST['recordar'])) {
          setcookie('nombreUsuario', $usuario, time() + 3600);
      } header('Location: bienvenida.php');
      exit();
    } else {
      echo "<p> El usuario o la contraseña son incorrectos<p>";
      echo '<a href="index.php">Atrás</a>';
    }
?>