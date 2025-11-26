<?php
    session_start();

    $cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave= '';

    try{
        $bd = new PDO ($cadena_conexion, $usuario, $clave);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $bd->query("SELECT * FROM usuarios");
        $enc=False;
        $nombre= $_POST["usuario"] ?? '';
        $contrasenya= $_POST["contrasenya"] ?? '';

        foreach ($consulta as $fila) {
            if($nombre == $fila['Nombre'] && $contrasenya==$fila['Clave'])
            {$enc=True;}
        }


        if($enc== True){
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
    }
    catch (PDOException $e){
        echo 'Error con la base de datos: '.$e->getMessage();
    }