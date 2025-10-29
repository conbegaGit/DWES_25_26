<?php 
    if(empty($_GET['nombre'])) {
        echo "No hay datos";
    } else {
        echo "Hola " . $_GET['nombre'] . ", bienvenido a mi sitio web.";
    }