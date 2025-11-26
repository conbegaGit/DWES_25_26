<?php 
if (empty($_GET["nombre"])){
    echo "error, falta el parametro nombre";
}else{
    echo "hola " . $_GET["nombre"];
}