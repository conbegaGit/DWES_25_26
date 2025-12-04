<?php

session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $clave = trim($_POST["clave"]);

        if (!empty($nombre) && !empty($clave)) {
            $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = :nombre AND Clave = :clave");
            $stmt->execute([$nombre, $clave]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                session_regenerate_id(true);
                $_SESSION['user'] = $user;
                
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                header("Location: dashboard.php");
            }
        } else {
            $error = "Usuario o contraseña incorrectos.";
            header("Location: dashboard.php");
        }
}
?>
    