<?php

session_start();
require_once "includes/functions.php";
require_once "includes/db.php"; // conexion a la base de datos

$error = "";

//Comprobar si se envio el formulario
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = trim($_POST["nombre"]);
    $clave = trim($_POST["clave"]);

    if(!empty($nombre) && !empty($clave)){
        //Preparar y ejecutar la consulta
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
        $stmt->execute([$nombre]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($clave, $user['Clave'])){
            //Login correcto: almacenar en sesión
            session_regenerate_id(true);
            $_SESSION["user"] = $user;

            flash_set("Bienvenido " . $_SESSION['user']['Nombre']);
            header("Location: dashboard.php");
            exit;
        } else{
            $error = "Usuario o clave incorrectos.";
            header("Location: index.php");
        }
    } else{
        $error = "Usuario o clave incorrectos.";
        redirect("index.php");
    }
}