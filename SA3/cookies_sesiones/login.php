<?php
    session_start();

    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    if($usuario === "admin" && $clave === "1234"){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['clave'] = $clave;
        
        if(isset($_POST['recordar'])){
            setcookie("cookie_usuario", $usuario, time() + (7 * 24 * 60 * 60));
        }

        header("Location: bienvenida.php");
        exit;
    }
    
    else{
        echo "<p>Usuario o contraseña incorrecto</p>";
        echo '<a href="index.php">Volver</a>';
    }