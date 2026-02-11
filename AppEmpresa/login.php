<?php
// Habilitar visualización de errores para diagnóstico
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Si ya hay sesión activa, redirigir al dashboard
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}

require_once "includes/db.php"; // conexion a la BBDD
require_once "includes/functions.php";
require_once "includes/auth.php";

$error = '';

if (is_post()) {
    try {
        $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (empty($usuario) || empty($password)) {
            $error = 'Por favor completa todos los campos';
        } else {
            // Preparar y ejecutar consulta segura con PDO
            $stmt = $bd->prepare('SELECT Clave, Rol FROM usuarios WHERE Nombre = :usuario LIMIT 1');
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $error = 'Usuario no encontrado: ' . htmlspecialchars($usuario);
            } elseif (!password_verify($password, $row['Clave'])) {
                $error = 'Usuario o contraseña incorrectos';
            } else {
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    'Nombre' => $usuario,
                    'Rol' => $row['Rol']
                ];
                flash_set("Bienvenido " . $usuario);
                header('Location: dashboard.php');
                exit();
            }
        }
    } catch (Exception $e) {
        $error = 'Error. Inténtalo más tarde.';
        error_log('Login error: ' . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Empresa</title>
    <link rel="stylesheet" href="/AppEmpresa/css/style.css">
</head>

<body class="login-body">
    <div class="login-box">
        <h2>Iniciar Sesión</h2>

        <?php if (!empty($error)): ?>
            <div class="flash error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label>
                Usuario
                <input type="text" name="usuario" required autofocus>
            </label>
            <label>
                Contraseña
                <input type="password" name="password" required>
            </label>
            <div class="actions">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>

</html>