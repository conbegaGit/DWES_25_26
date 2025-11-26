<?php
    session_start();
    try{
        $cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1;charset=utf8';
        $usuario = 'root';
        $clave = '';
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        $bd->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        $usuario = $_POST["nombre"] ?? '';
        $clave = $_POST["contraseña"] ?? '';
        $find = false;
        $consulta = $bd->query("SELECT * FROM usuarios");
        foreach($consulta as $fila){
            if($usuario == $fila['Nombre'] && $clave == $fila['Clave']){
                $find = true;
            }
        }
        if($find == true){
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
    }
    catch(PDOException $e){
        echo 'Error con la base de datos: '. $e->getMessage();
    }