<?php
session_start();
require_once '../AppEmpresa/includes/db.php';
require_once '../AppEmpresa/includes/functions.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre'] ?? '');
    $clave  = trim($_POST['clave'] ?? '');

    if (!empty($nombre) && !empty($clave)) {

        // Buscar usuario solo por el nombre
        $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
        $stmt->execute([$nombre]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar contraseña con password_verify
        if ($user && password_verify($clave, $user['Clave'])) {

            session_regenerate_id(true);
            $_SESSION['user'] = $user;

            flash_set("Bienvenido, " . $_SESSION['user']['Nombre'] . "!");
            header("Location: dashboard.php");
            exit();

        } else {
            flash_set("Nombre de usuario o clave incorrectos.");
            header("Location: index.php");
            exit();
        }

    } else {
        flash_set("Nombre de usuario o clave incorrectos.");
        header("Location: index.php");
        exit();
    }
}
