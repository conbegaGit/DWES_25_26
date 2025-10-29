<?php
    if (empty($_GET["nombre"])){
        echo "Error, falta el primer nombre";
    }else{
        echo "Hola " . $_GET["nombre"];
    }