<?php
$cadena_conexion = "mysql:dbname=empresa;host=localhost";
$usuario = "root";
$clave = "";
session_start();

$usuario1 = $_POST['nombre'] ?? '';
$password1 = $_POST['contrasena'] ?? '';

try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = $bd->query("SELECT * FROM usuarios");

    $encontrado = false;

    foreach($consulta as $fila){
        if ($usuario1 === $fila['Nombre'] && $password1 === $fila['Clave']) {
            $encontrado = true;
            $_SESSION['nombre'] = $usuario1;

            if (isset($_POST['recordar'])) {
                setcookie('userrecordado', $usuario1, time() + (24*60*60)); 
            }
            break;
        }
    }
    
    if ($encontrado==true) {
        header("Location: bienvenida.php");
        exit();
    } else {
        echo "<p>Usuario o contraseña incorrectos.</p>";
        echo '<a href="index.php">Volver</a>';
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}