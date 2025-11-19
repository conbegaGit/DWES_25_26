<?php
session_start();

if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
$usuario = $_SESSION['usuario'];
$nombreRecordado = $_COOKIE['nombre_usuario'] ?? '';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset = "UTF-8">
    <title>Página de Bienvenida</title>
</head>
<body>
    <h2>Bienvenido, <?= htmlspecialchars($usuario) ?>!</h2>

    <?php if ($nombreRecordado): ?>
        <p>Te recordamos de la ultima vez que iniciaste sesion como <strong><?= htmlspecialchars($usuario) ?>!</h2>
        <?php endif; ?>

        <p> Esta es tu sesion activa. Puedes navegar sin volver a iniciar sesión. </p>

        <a href="logout.php">Cerrar sesión</a>
</body>
</html>