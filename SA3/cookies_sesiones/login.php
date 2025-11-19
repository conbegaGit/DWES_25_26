<?php
    session_start();

    $nombre= $_POST["usuario"] ?? '';
    $contrasenya= $_POST["contrasenya"] ?? '';

    if($nombre=="Fran" && $contrasenya=="1234"){
        $_SESSION["usuario"]=$nombre;
        
        if(isset($_POST['recordarUsuario'])){
            setcookie("usuario", $nombre, time() + 7*24*3600);
        }

        header('Location: bienvenida.php');
        exit;
    }
    else {
        echo "<p>Usiario o contraseña equivocada vuelvelo a intentar</p>";
        echo '<a href="index.php"> Volver</a>';
    }
