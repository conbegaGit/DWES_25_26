<?php
setcookie("usuario", "", time() - 3600);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset = "UTF-8">
    <title>Cookie borrada</title>
</head>

<body>
    <h1>Has cerrado sesión correctamente</h1>
    <a href="index.php">Volver al inicio</a>