<?php

session_start();
if(isset($_SESSION["usuario"])){
        header("Location: index.php");
        exit;
}

$usuario = $_SESSION('usuario');
$recuerdo = $_COOKIE('cookie_usuario');



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset = "UTF-8">
    <title>Bienvenida </title>
</head>

<body>
    <h2>¡Bienvenido, <?= htmlspecialchars($usuario) ?>!</h2>
    <?php if($recuerdo): ?>
        <p>Te recordamos tu inicio de sesión como usuario <strong><?= htmlspecialchars($usuario) ?></strong></p>
    <?php endif;?>
    <p>Esta es tu sesión. Navega sin iniciar sesión si lo prefieres.</p>
    <a href ="logout.php">Cerrar sesión</a>
</body>

</html>