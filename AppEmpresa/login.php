<?php
session_start();

// Simulamos una base de datos de usuarios (en producción usar una BD real)
$usuarios = [
    'admin' => 'admin',
    'usuario' => 'usuario'
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (empty($usuario) || empty($password)) {
            $error = 'Por favor completa todos los campos';
        } elseif (!isset($usuarios[$usuario]) || $usuarios[$usuario] !== $password) {
            $error = 'Usuario o contraseña incorrectos';
        } else {
            $_SESSION['usuario'] = $usuario;
            header('Location: dashboard.php');
            exit();
        }
    } catch (Exception $e) {
        $error = 'Error interno. Intente más tarde.';
        error_log('Login error: ' . $e->getMessage());
    }
}
