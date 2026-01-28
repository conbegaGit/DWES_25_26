<?php
session_start();

// Destruir la sesión
session_destroy();
$_SESSION = [];
// Redirigir al login
header("Location: index.php");
exit;