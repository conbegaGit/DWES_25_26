<?php
session_start();
require_once "includes/db.php";



//comprobar foormulario
if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $nombre=trim($_POST["nombre"]);
    $clave=trim($_POST["clave"]);
    if(!empty($nombre) && !empty($clave)){
        $stmt = $bd->prepare("SELECT* FROM usuarios WHERE Nombre = ? AND Clave");
        $stmt ->execute([$nombre,$clave]);
        $user = $stm->dba_fetch(PDO::FETCH_ASSOC);
        if ($user){
            //logincorrecto: almacenar sesion
            session_regenerate_id(true);
            $_SESSION["user"]= $user;

            //flash_set("Bienvenido" . $_SESSION['user'] ['Nombre']);
            header("Location:dashboard.php");
            exit;
        }else{
            $error = "Usuario o clave incorrectos";
            header("Location: index.php");
        }
    }else{
        $error = "Usuario o clave incorrectos";
            header("Location: index.php");
    }
}