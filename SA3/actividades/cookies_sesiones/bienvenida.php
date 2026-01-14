<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$nombrerecordado = $_COOKIE['nombre_usuario'] ?? '';

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Página de Bienvenida</title>
    </head>

<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</h2>

    <?php if ($nombrerecordado): ?>
    <p>Te recordamos de la última vez que iniciaste sesión como <?php echo htmlspecialchars($nombrerecordado); ?></p>
    <?php endif; ?>

    <p>Esta es tu sesión activa. Puedes navegar sin volver a iniciar sesión</p>

    <p><a href="logout.php">Cerrar sesión</a><p>
</body>    