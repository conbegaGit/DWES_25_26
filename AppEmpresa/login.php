<?php
session_start();
require_once "./includes/db.php";
require_once "./includes/functions.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $clave = trim($_POST['clave']);

    if (!empty($nombre) && !empty($clave)) {
        $consulta = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?");
        $consulta->execute([$nombre, $clave]);
        $user = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user'] = $user;
            header("Location: ./dashboard.php");
            exit();
        } else {
            $error = "Nombre de usuario o clave incorrectos.";
            header("Location: index.php");
        }
    } else {
        $error = "Nombre de usuario o clave incorrectos.";
        header("Location: index.php");
    }
} 