<?php
session_start();

$usuario_input = $_POST["usuario"] ?? '';
$clave_input = $_POST["clave"] ?? '';

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario_bd = 'root';
$contraseña_bd = ''

try {
    $bd = new PDO($cadena_conexion, $usuario_bd, $contraseña_bd);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = $bd->prepare("SELECT Nombre FROM usuarios WHERE Nombre = :nombre AND Clave = :clave");
    $consulta->bindParam(':nombre', $usuario_input);
    $consulta->bindParam(':clave', $clave_input);
    $consulta->execute();
    
    $fila = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($fila) { 
        $_SESSION['usuario'] = $fila['Nombre']; 
        
        if (isset($_POST['recordar'])){
            setcookie('usuario' , $fila['Nombre'], time() + (7 * 24 * 60 * 60)); 
        }
        
        header('Location: bd_empresa.php'); 
        exit;
    } else {
        echo "<p>Usuario o Contraseña incorrectos</p>";
        echo '<a href ="index.php"> Volver </a>';
    }

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
    echo '<br><a href ="index.php"> Volver al login </a>';
}