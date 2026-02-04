<?php
session_start();

require_once "./includes/db.php";
require_once "./includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['nombre'] ?? '');
    $clave   = trim($_POST['clave'] ?? '');

    if ($usuario !== '' && $clave !== '') {

        // Buscar usuario SOLO por nombre
        $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar contraseña con hash
        if ($user && password_verify($clave, $user['Clave'])) {

            session_regenerate_id(true);
            $_SESSION['user'] = $user;

            flash_set("Bienvenid@, " . $user['Nombre']);
            header("Location: dashboard.php");
            exit;

        } else {
            flash_set("Usuario o clave incorrectos");
            header("Location: index.php");
            exit;
        }

    } else {
        flash_set("Debes introducir usuario y clave");
        header("Location: index.php");
        exit;
    }
}
