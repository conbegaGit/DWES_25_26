<?php
    session_start();

    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuarioBD = 'root';
    $clave = '';
    try{
        $db = new PDO($cadena_conexion, $usuario, $clave);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $encontrado = null;
        $consulta = $bd->query("SELECT Nombre FROM usuarios");
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];

        foreach($consulta as $dato){
            if($dato == $usuario){
                $encontrado = true;
                break;
            }
        }

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
    }catch(PDOException $e){
        echo 'Error con la base de datos: ' . $e->getMessage();
    }