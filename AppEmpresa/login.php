<?php

session_start();
require_once "includes/db.php";
require_once "includes/functions.php";
$error = "";

//comprobar si se envio el usuario
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = trim($_POST["usuario"]);
    $clave = trim($_POST["clave"]);

    if(!empty($nombre) && !empty($clave)){
        //preparar y ejecutar la consulta 
        $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?");
        $stmt->execute([$nombre, $clave]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            //Login correcto: almacenar en sesión
            session_regenerate_id(true);
            $_SESSION["user"] = $user;

            header("Location: dashboard.php");
            flash_set("Bienvenido, " . $user['Nombre']);
            exit;
        }else{
                $error = "Usuario o clave incorrectos.";
                header("Location: index.php");
         } 
    }else{
        $error = "Usuario o clave incorrectos.";
        header("Location: index.php");
    }  
              
}