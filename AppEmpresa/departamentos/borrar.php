<?php
    session_start();
    require_once "../includes/db.php";
    require_once "../includes/functions.php";
    //require_once "../includes/auth.php";
       
    //require_admin();

    $id = intval($_GET['id'] ?? 0);
    if($id){
        $bd->prepare("DELETE FROM departamentos WHERE CodDept = ?")->execute([$id]);
        flash_set("Departamento borrado");
    }
    header("Location: listar.php");
    exit;