<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['nombre'];
$nombreRecordado = $_COOKIE['userrecordado'] ?? '';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Página de Bienvenida</title>
</head>

<body>
    <h1>Bienvenido, <?= htmlspecialchars($usuario) ?>!</h1>

    <?php if ($nombreRecordado): ?>
        <p>Nos alegra verte de nuevo, <?= htmlspecialchars($nombreRecordado) ?>!</p>
    <?php endif; ?>

        <p> Esta es tu sesión activa. Puedes navegar sin volver a iniciar sesión. </p>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
