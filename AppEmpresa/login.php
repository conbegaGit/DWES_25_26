<?php

session_start();
require_once "../AppEmpresa/includes/db.php"; // Conexión a la base de datos
require_once "../AppEmpresa/includes/functions.php"; // Funciones auxiliares

$error = '';

// Comprobar si se envió el formulario

if (is_post()) {
    $nombre = trim($_POST['nombre']);
    $clave = trim($_POST['clave']);


    if(!empty($nombre) && !empty($clave)){
        // Preparar y ejecutar la consulta
        $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
        $stmt->execute([$nombre]);
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($clave, $user['Clave'])){
            //Login correcto: Almacenar en sesión
            session_regenerate_id(true);
            $_SESSION["user"] = $user;

            // Mensaje de bienvenida
            flash_set("Bienvenido " . $user['Nombre']);
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Usuario o clave incorrectos";
            header("Location: index.php");
        }
    } else {
        $error = "Usuario o clave incorrectos";
        header("Location: index.php");
    }
}