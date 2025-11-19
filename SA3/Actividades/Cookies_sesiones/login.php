<?php
    session_start();

    $usuario = $_POST["nombre"] ?? '';
    $clave = $_POST["contraseña"] ?? '';

    if($usuario === 'admin' && $clave === '1234'){
        $_SESSION['usuario'] = $usuario;
        if(isset($_POST['recuerda'])){
            setcookie('nombreUsuario', $usuario, time() + 604800);
        }
        header('Location: bienvenida.php');
        exit;
    }
    else{
        echo '<p>El usuario o la contraseña son incorrectos</p>';
        echo '<a href="index.php">Atras</a>';
    }