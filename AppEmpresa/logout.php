<?php
session_start();

//Destruir sesión
session_destroy();
//Redirigir a login
header("Location: index.php");
exit();