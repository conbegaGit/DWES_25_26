<?php
    // Verifica si el parámetro "nombre" está vacío o no existe en la URL
    if (empty($_GET["nombre"])) {
        // Si no se proporcionó el parámetro nombre, muestra un mensaje de error
        echo "Error, falta el parámetro nombre.";
    } else {
        // Si el parámetro nombre existe y tiene valor, saluda a la persona
        echo "Hola, ". $_GET["nombre"];
    }
