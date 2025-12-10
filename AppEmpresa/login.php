<?php
session_start();

// Si ya hay sesión activa, redirigir al dashboard
if (isset($_SESSION['usuario'])) {
    header('Location: dashboard.php');
    exit();
}

require_once "includes/db.php"; // conexion a la BBDD

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (empty($usuario) || empty($password)) {
            $error = 'Por favor completa todos los campos';
        } else {
            // Preparar y ejecutar consulta segura con PDO
            $stmt = $db->prepare('SELECT Clave FROM usuarios WHERE Nombre = :usuario LIMIT 1');
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $error = 'Usuario no encontrado: ' . htmlspecialchars($usuario);
            } elseif ($row['Clave'] !== $password) {
                $error = 'Usuario o contraseña incorrectos';
            } else {
                session_regenerate_id(true);
                $_SESSION['usuario'] = $usuario;
                header('Location: dashboard.php');
                exit();
            }
        }
    } catch (Exception $e) {
        $error = 'Error. Inténtalo más tarde.';
        error_log('Login error: ' . $e->getMessage());
    }
}