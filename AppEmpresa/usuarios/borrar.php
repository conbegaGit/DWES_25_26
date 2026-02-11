<?php
    session_start();
    require_once __DIR__ . "/../includes/auth.php";
    require_once __DIR__ . "/../includes/db.php";
    require_once __DIR__ . "/../includes/functions.php";

    requiere_admin();
    
    $id = intval($_GET['id'] ?? 0);
    if($id){
        $bd->prepare("DELETE FROM usuarios WHERE Codigo = ?")->execute([$id]);
        flash_set("Usuario borrado");
    }
    redirect('listar.php');