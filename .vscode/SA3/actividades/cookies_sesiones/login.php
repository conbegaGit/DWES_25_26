<?php
session_start();
 $usuario = $_POST['user'] ?? '';
 $contraseña = $_POST['contraseña'] ?? '';
 

 if($usuario === 'admin' && $contraseña === '1234'){
    $_SESSION['user']=$usuario;
        if (isset($_POST['recordar'])){
        setcookie('usuario',$usuario,time() +(7*24*60*60));
        
    }
    header('Location: bienvenida.php');
        exit;
    
    }else{
        echo "<p>Usuario o contraseña incorrectos</p>";
        echo '<a href="index.php">volver</a>';
    }
    ?>