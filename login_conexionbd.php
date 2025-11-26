<?php
try {
session_start(); // Iniciar sesion
$usuario = $_POST['nombre'] ?? '';
$clave = $_POST['clave'] ?? '';
if ($usuario === 'root' && $clave === '') {
        $_SESSION['nombre'] = $usuario;
        if(isset($_POST['recordar'])) {
          setcookie('nombreUsuario', $usuario, time() + 3600);
      } header('Location: bienvenida.php');
      exit();
    } else {
      echo "<p> El usuario o la contraseña son incorrectos<p>";
      echo '<a href="index.php">Atrás</a>';
    } 
} catch (PDOException $e) {
        echo 'Error con la base de datos: '. $e->getMessage(); 
    }