<?php
    if(empty($_GET["nombre"])){
        echo "Error, falta el parametro nombre";
    }
    else{
        echo "Hola " . $_GET["nombre"];
    }