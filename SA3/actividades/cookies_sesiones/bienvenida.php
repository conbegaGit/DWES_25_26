<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit;
}

$usuario = $_SESSION['usuario'];
$nombreRecordad = $_COOKIE['nombreUsuario'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hola, <?php echo htmlspecialchars($nombreRecordad); ?></title>
</head>

<body>

    <h1>Hola, <?php echo htmlspecialchars($usuario); ?></h1>

    <?php if ($nombreRecordad): ?>
    <p>Te recordamos que has iniciado sesión como: <?php echo htmlspecialchars($nombreRecordad); ?></p>
    <?php endif; ?>

    <p>Esta es tu sesión activa. Puedes navegar sin vovler a iniciar sesión.</p>

    <p><a href="logout.php">Cerrar sesión</a></p>
    
</body>

</html>