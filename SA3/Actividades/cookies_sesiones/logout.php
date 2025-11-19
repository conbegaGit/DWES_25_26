<?php
session_start();

session_unset();
session_destroy();

setcookie('userrecordado', '', time() - 24*60*60);

header("Location: index.php");
exit();
