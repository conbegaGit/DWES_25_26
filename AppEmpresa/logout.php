<?php
session_start();
require_once '../AppEmpresa/includes/functions.php';

//Destruir sesión
session_destroy();
//Redirigir a login
redirect('index.php');