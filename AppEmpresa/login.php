<?php

session_start();
require_once "includes/db.php"; // Conexión a la base de datos
require_once "includes/functions.php"; // Funciones auxiliares

$error = '';

// Comprobar si se envió el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $clave = trim($_POST['clave']);


    if(!empty($nombre) && !empty($clave)){
        // Preparar y ejecutar la consulta

       //  1  $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?");
      //  2 $stmt->execute([$nombre, $clave]);          (clave normal, no hasheada)
       // 3 $user = $stmt -> fetch(PDO::FETCH_ASSOC);
       //4 if($user && password_verify($clave, $user['Clave'])){

        $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
        $stmt->execute([$nombre]);
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($clave, $user['Clave'])){
            //Login correcto: Almacenar en sesión
            session_regenerate_id(true);
            $_SESSION["user"] = $user;

            flash_set("Bienvenido " . $_SESSION['user']['Nombre']);
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Usuario o clave incorrectos";
            flash_set($error);
            header("Location: index.php");
        }
    } else {
        $error = "Usuario o clave incorrectos";
        flash_set($error);
        header("Location: index.php");
    }
}