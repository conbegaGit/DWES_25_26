<?php
    session_start();
    require_once __DIR__ . "/../includes/auth.php";
    require_once __DIR__ . "/../includes/db.php";
    require_once __DIR__ . "/../includes/functions.php";

    $id = intval($_GET['id'] ?? 0);
    if($id){
        $bd->prepare("DELETE FROM departamentos WHERE CodDept = ?")->execute([$id]);
        flash_set("Departamento borrado");
    }
    header("Location: listar.php");
    exit;