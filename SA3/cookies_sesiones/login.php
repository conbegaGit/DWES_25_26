<?php

//TODAVIA NO ESTA COMPLETOOOO :(
 $cadena_conexion = 'mysql:dbname=empresa;host=localhost;charset=utf8';
$usuario = 'root';
$clave = '';  

session_start();

$usuario1 = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';


        try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Le dice a PHP que capture el error en el chatch 


        $consulta = $bd->query("SELECT * FROM usuarios");
            $buscar = false;
            foreach($consulta as $fila){
                if ($usuario1 === $fila['Nombre']  && $clave === $fila['Clave']) {
                    $buscar = true;
                }
            }   
    } catch (PDOException $e){
        echo "Error de conexión: " . $e->getMessage();
    }

if ($buscar == true) {
    $_SESSION['usuario'] = $usuario;
    if (isset($_POST['recordar'])) {
        setcookie('usuariorec', $usuario, time() + (3600));

    }
        header("Location: bienvenida.php");
        exit;

} else {
    echo "Usuario o clave incorrectos." ;
    echo "<a href='index.php'>Volver</a>";
}

