<?php 
    if (empty($_GET["nombre"])) {
        echo "Error, falta el parámetro 'nombre'";
    } else {
        echo "Hola, " . $_GET["nombre"];
    }

    //http://localhost:3000/SA3/hola_comprobacion.php?nombre=Ashley    desde la web 
