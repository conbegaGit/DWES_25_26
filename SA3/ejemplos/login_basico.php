<?php
    echo "Usuario instroducido: " . $_POST['usuario'] . "<br>";
    echo "Contraseña instroducida: " . $_POST['contrasena'] . "<br>";

    $cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1;charset=utf8';
    $cont = false;

    try{
        $bd = new PDO($cadena_conexion, 'root', '');
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = :usuario AND Clave = :contrasena");
       
        $consulta->execute(array(
            ':usuario0' => $_POST['usuario'],
            ':contrasena0' => $_POST['contrasena']
        ));

        if($consulta->rowCount() > 0){
            echo "<h3>¡Acceso concedido!</h3>";
            $cont = true;
        } else {
            echo "<h3>Acceso denegado. Usuario o contraseña incorrectos.</h3>";
        }     
    
    }catch(PDOException $e){
        echo 'Error de conexión: ' . $e->getMessage();
    }