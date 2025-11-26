<?php
session_start(); 
setcookie("usuario", "", time() - 3600); 
session_destroy(); 
header("Location: index.php");
exit();