<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            margin-top: 0;
            color: #1e3a8a;
        }
        a:hover {
            background: #1e40af;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>¡Bienvenido al portal!</h1>
    <p>Has iniciado sesión correctamente.</p>
    <a href="logout.php">Cerrar sesión</a>
</div>

</body>
</html>
