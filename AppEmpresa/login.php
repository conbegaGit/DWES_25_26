<?php
session_start();
require_once "./includes/db.php";
require_once "./includes/functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = trim($_POST['nombre'] ?? '');
    $clave   = trim($_POST['clave'] ?? '');

    if (!empty($usuario) && !empty($clave)) {

        $sql = "SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?";
        $stmt = $bd->prepare($sql);
        $stmt->execute([$usuario, $clave]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            session_regenerate_id(true);
            $_SESSION["user"] = $user;

            header("Location: dashboard.php");
            flash_set("Bienvenid@, " . $user['Nombre']);
            exit;
        } else {
            $error = "Usuario o clave incorrectos.";
            header("Location: index.php");
            exit;
        }

    } else {
        $error = "Debes introducir usuario y clave.";
        header("Location: index.php");
        exit;
    }
}
?>
